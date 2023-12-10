<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */
class CategoryController extends Controller
{
   public function index()
   {
      $paginate = \env('PAGINATE', 25);
      $categories = Category::paginate($paginate);
      $parentCategories = Category::whereNull('parent_id')->get();
      return view('pages.dashboards.categories.index', [
         'categories' => CategoryResource::collection($categories),
         'parentCategories' => CategoryResource::collection($parentCategories),
      ]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required|string|max:255',
         'description' => 'nullable|string',
      ]);

      $category =  Category::create($request->all());

      return response()->json($category);
   }
   public function update(Request $request, $id)
   {
      $category = Category::find($id);
      $category->update($request->all());
      return response()->json(['message' => 'Category updated successfully']);
   }
   public function destroy($id)
   {
      $category = Category::findOrFail($id);

      try {
         $category->delete();
         return response()->json(['message' => 'Category deleted successfully']);
      } catch (\Exception $e) {
         return response()->json(['error' => 'Error deleting category'], 500);
      }
   }
}
