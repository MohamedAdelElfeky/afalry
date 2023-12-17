<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComplaintResource;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $complaints = Complaint::where('user_id', $user->id)->get();
        return response()->json(ComplaintResource::collection($complaints), 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'nullable|in:pending,approved,rejected',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $data = array_merge($request->all(), ['user_id' => $user->id, 'status' => 'pending']);
        Complaint::create($data);

        return response()->json(['message' => 'تمت إضافة الشكوي بنجاح'], 201);
    }
}
