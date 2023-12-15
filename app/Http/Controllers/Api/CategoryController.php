<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryWithProductsResource;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class CategoryController extends Controller
{

    public function index(Request $request)
    {
        // dd($request);
        $type = $request->type;
        if ($type == 'parent') {
            $categories = Category::whereNull('parent_id')->get();
        } elseif ($type == 'child') {
            $categories = Category::whereNotNull('parent_id')->get();
        } else {
            $categories = Category::all();
        }
        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No Categories found'], 200);
        }
        return response()->json(CategoryResource::collection($categories), 200);
    }

    public function show($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(new CategoryResource($category), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }

    public function categoriesWProducts()
    {
        $categories = Category::all();
        if ($categories->isEmpty()) {
            return response()->json(['message' => 'No Categories found'], 200);
        }
        return response()->json(CategoryWithProductsResource::collection($categories), 200);
    }

    public function categoryWProducts($id)
    {
        try {
            $category = Category::findOrFail($id);
            return response()->json(new CategoryWithProductsResource($category), 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Category not found'], 404);
        }
    }
}
