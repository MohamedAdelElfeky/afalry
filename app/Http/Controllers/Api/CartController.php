<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{


    public function index(Request $request)
    {
        $user = Auth::user();

        $cartContents = Cart::with('product')->where('user_id', $user->id)->get();

        return response()->json(CartResource::collection($cartContents), 200);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $product = Product::findOrFail($request->product_id);

        $existingCart = Cart::where([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ])->first();

        if ($existingCart) {
            $existingCart->update([
                'quantity' => $existingCart->quantity + $request->quantity,
            ]);
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'تمت إضافة المنتج إلى سلة التسوق بنجاح'], 201);
    }

    public function update(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'cart_id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $user = Auth::user();

        try {
            $cart = Cart::findOrFail($request->cart_id);

            if ($cart->user_id !== $user->id) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            $cart->update(['quantity' => $cart->quantity + $request->quantity]);

            return response()->json(['message' => 'تم تحديث عنصر سلة التسوق بنجاح']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'لم يتم العثور على عنصر سلة التسوق'], 404);
        }
    }

    public function destroy(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cart_id' => 'required|exists:carts,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 400);
        }

        $user = Auth::user();

        try {
            $cart = Cart::findOrFail($request->cart_id);

            if ($cart->user_id !== $user->id) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $cart->delete();

            return response()->json(['message' => 'تمت إزالة عنصر سلة التسوق بنجاح']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['message' => 'لم يتم العثور على عنصر سلة التسوق'], 404);
        }
    }

    public function destroyAll(Request $request)
    {
        $user = Auth::user();
        try {
            $cart = Cart::where('user_id', $user->id)->get();

            if ($cart->isEmpty()) {
                return response()->json(['message' => 'لم يتم العثور على عربة التسوق للمستخدم'], 404);
            }

            $cart->each->delete();

            return response()->json(['message' => 'تمت إزالة جميع العناصر من سلة التسوق بنجاح'], 200);
        } catch (Exception $exception) {
            return response()->json(['message' => 'حدث خطأ أثناء إزالة العناصر من سلة التسوق'], 500);
        }
    }
}
