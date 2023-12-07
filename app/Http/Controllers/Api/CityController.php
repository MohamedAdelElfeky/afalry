<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        if ($cities->isEmpty()) {
            return response()->json(['message' => 'No Cities found'], 200);
        }
        return response()->json(CityResource::collection($cities), 200);
    }
}
