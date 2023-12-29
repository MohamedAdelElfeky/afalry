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
        $products = Product::with('category')->where('status', 'active')->get();

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

    public function productsByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        // Check if category_id is provided
        if (!$categoryId) {
            return response()->json(['message' => __('lang.category_id_is_required')], 400);
        }
        // Retrieve products with the specified category
        $products = Product::whereHas('category', function ($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })->get();

        // Check if products are found
        if ($products->isEmpty()) {
            return response()->json(['message' => __('lang.no_products_found_for_the_specified_category')], 404);
        }

        // Return the products in JSON format
        return response()->json(ProductResource::collection($products), 200);
    }
}
