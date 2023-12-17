<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReasonResource;
use App\Models\Reason;
use Illuminate\Http\Request;

class ReasonController extends Controller
{
    public function index()
    {
        $reasons = Reason::all();
        if ($reasons->isEmpty()) {
            return response()->json(['message' => 'No Reasons found'], 200);
        }
        return response()->json(ReasonResource::collection($reasons), 200);
    }
}
