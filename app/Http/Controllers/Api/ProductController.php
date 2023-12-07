<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductWAttCommentResource;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No Products found'], 200);
        }

        return response()->json(ProductResource::collection($products), 200);
    }

    public function show($id)
    {
        try {
            $product = Product::with('category')->findOrFail($id);
            return response()->json(new ProductResource($product), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function productsWAttribute($id)
    {
        try {
            $product = Product::with('category')->findOrFail($id);
            return response()->json(new ProductWAttCommentResource($product), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    public function getUserLikes()
    {
        $user = Auth::user();
        $likes = $user->likes;

        if ($likes !== null) {
            $formattedLikes = [
                'type' => 'Products',
                'data' => ProductResource::collection($likes)
            ];
            return response()->json(['data' => $formattedLikes]);
        } else {
            return response()->json(['data' => null]);
        }
    }
}
