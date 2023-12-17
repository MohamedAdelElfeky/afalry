<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        if ($payments->isEmpty()) {
            return response()->json(['message' => 'No Payments found'], 200);
        }
        return response()->json(PaymentResource::collection($payments), 200);
    }
}
