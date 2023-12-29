<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SidebarResource;
use App\Models\Sidebar;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function index()
    {
        $sidebars = Sidebar::all();
        if ($sidebars->isEmpty()) {
            return response()->json(['message' => 'No Sidebars found'], 200);
        }
        return response()->json(SidebarResource::collection($sidebars), 200);
    }
}
