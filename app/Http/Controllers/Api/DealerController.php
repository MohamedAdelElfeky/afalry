<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DealerResource;
use App\Models\Dealer;
use Illuminate\Http\Request;
/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class DealerController extends Controller
{
    public function index()
    {
        $dealers = Dealer::all();
        if ($dealers->isEmpty()) {
            return response()->json(['message' => 'No Dealers found'], 200);
        }
        return response()->json(DealerResource::collection($dealers), 200);
    }
}
