<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function admins()
    {
        $paginate = \env('PAGINATE', 25);
        $admins = User::paginate($paginate);
        return view('pages.dashboards.admin.index', ['admins' => UserResource::collection($admins)]);
    }
    public function users()
    {
        return view('pages.dashboards.users.index');
    }

    public function updateStatus(Request $request)
    {
        $userId =  $request->input('user_id');
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->registration_confirmed = $request->input('confirmed');
        $user->save();

        return response()->json(['message' => 'User updated successfully']);
    }
}
