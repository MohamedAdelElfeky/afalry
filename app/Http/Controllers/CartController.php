<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class CartController extends Controller
{
    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $carts = Cart::paginate($paginate);
        return view('pages.dashboards.carts.index', [
            'carts' => CartResource::collection($carts),
        ]);
    }

    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);

        try {
            $cart->delete();
            return response()->json(['message' => 'Cart deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Cart'], 500);
        }
    }
}
