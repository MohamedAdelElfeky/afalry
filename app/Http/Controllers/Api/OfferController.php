<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $offers = Offer::paginate($paginate);
        if ($offers->isEmpty()) {
            return response()->json(['message' => 'No Categories found'], 200);
        }
        return response()->json(OfferResource::collection($offers), 200);
    }
}
