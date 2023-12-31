<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanResource;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        if ($plans->isEmpty()) {
            return response()->json(['message' => 'No Plans found'], 200);
        }
        return response()->json(PlanResource::collection($plans), 200);
    }
}
