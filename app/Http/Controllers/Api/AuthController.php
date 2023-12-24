<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class AuthController extends Controller
{


    public function register(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'nationality' => 'required|string',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|unique:users',
            'key_phone' => 'nullable',
            'password' => 'required|string|min:6|confirmed',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sex' => 'nullable',
            'questions' => 'nullable|array',
            'categories' => 'nullable|array',
        ], [
            'email.required' => __('validation.email.required'),
            'email.email' => __('validation.email.email'),
            'email.unique' => __('validation.email.unique'),
            'phone.required' => __('validation.phone.required'),
            'phone.string' => __('validation.phone.string'),
            'phone.unique' => __('validation.phone.unique'),
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $imagePathAvatar = "";
        if (request()->hasFile('avatar')) {
            $imageAvatar = request()->file('avatar');
            $file_name_avatar = time() . rand(0, 9999999999999) . '_avatar.' . $imageAvatar->getClientOriginalExtension();
            $imageAvatar->move(public_path('user/'), $file_name_avatar);
            $imagePathAvatar = "user/" . $file_name_avatar;
        }

        // Create the user
        User::create([
            'nationality' => $request->input('nationality'),
            'full_name' => $request->input('full_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'key_phone' => $request->input('key_phone'),
            'password' => bcrypt($request->input('password')),
            'sex' => $request->input('sex'),
            'questions' => $request->input('questions'),
            'categories' => $request->input('categories'),
            'avatar' => $imagePathAvatar,
        ]);

        return response()->json(['message' => 'تم التسجيل بنجاح'], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $credentials['login_identifier'])
            ->orWhere('phone', $credentials['login_identifier'])
            ->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'بيانات الاعتماد غير صالحة'], 401);
        }
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'message' => 'تم تسجيل الدخول بنجاح',
            'user' => new UserResource($user),
            'token' => $token,
        ], 201);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $token = $user->currentAccessToken();

        if ($token) {
            $token->delete();
            return response()->json(['message' => 'تم تسجيل الخروج بنجاح'], 201);
        }

        return response()->json(['message' => 'لا توجد جلسة نشطة'], 404);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            $firstError = current($validator->errors()->all());
            return response()->json(['message' => $firstError], 422);
        }

        $user = Auth::user();

        // Verify old password
        if (!Hash::check($request->input('old_password'), $user->password)) {
            return response()->json(['message' => 'كلمة المرور القديمة غير متطابقة'], 422);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->input('password')),
        ]);

        // Revoke current access token
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        // Generate a new access token
        $newToken = $user->createToken('newAuthToken')->plainTextToken;

        return response()->json([
            'message' => 'تم تحديث كلمة السر وإعادة توليد الرمز بنجاح',
            'user' => new UserResource($user),
            'token' => $newToken,
        ], 201);
    }
}
