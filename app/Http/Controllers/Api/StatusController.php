<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatusResource;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        if ($statuses->isEmpty()) {
            return response()->json(['message' => 'No Statuses found'], 200);
        }
        return response()->json(StatusResource::collection($statuses), 200);
    }

}
