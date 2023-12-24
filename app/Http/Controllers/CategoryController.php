<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Image;
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
      // dd($request->type);
      $type = $request->type;
      $paginate = \env('PAGINATE', 25);
      if ($type == 'parent') {
         $categories = Category::whereNull('parent_id')->paginate($paginate);
      } elseif ($type == 'child') {
         $categories = Category::whereNotNull('parent_id')->paginate($paginate);
      }
      $parentCategories = Category::whereNull('parent_id')->get();
      return view('pages.dashboards.categories.index', [
         'categories' => CategoryResource::collection($categories),
         'parentCategories' => CategoryResource::collection($parentCategories),
         'type' => $type,
      ]);
   }

   public function store(Request $request)
   {
      $request->validate([
         'name' => 'required|array|max:255',
         'description' => 'nullable|string',
         'images' => 'image|mimes:svg|max:2048',
      ]);
      $type = $request->type;
      if ($type == 'parent') {
         $category = Category::create([
            'name' => $request->name[0],
            'description' => $request->description,
         ]);
         if (request()->hasFile('images')) {
            $image = $request->file('images');
            $imageType = $image->getClientOriginalExtension();
            $mimeType = $image->getMimeType();
            $file_name = time() . rand(0, 9999999999999) . '_category.' . $image->getClientOriginalExtension();
            $image->move(public_path('category/images/'), $file_name);
            $imagePath = "category/images/" . $file_name;
            $imageObject = new Image([
               'url' => $imagePath,
               'mime' => $mimeType,
               'image_type' => $imageType,
            ]);
            $category->images()->save($imageObject);
         }
      } elseif ($type == 'child') {
         $categories = [];
         foreach ($request->name as $name) {
            $categories[] = Category::create([
               'name' => $name,
               'description' => $request->description,
               'parent_id' => $request->parent_id,
            ]);
            if (request()->hasFile('images')) {
               $image = $request->file('images');
               $imageType = $image->getClientOriginalExtension();
               $mimeType = $image->getMimeType();
               $file_name = time() . rand(0, 9999999999999) . '_category.' . $image->getClientOriginalExtension();
               $image->move(public_path('category/images/'), $file_name);
               $imagePath = "category/images/" . $file_name;
               $imageObject = new Image([
                  'url' => $imagePath,
                  'mime' => $mimeType,
                  'image_type' => $imageType,
               ]);
               $category->images()->save($imageObject);
            }
         }
         $category = $categories;
      }

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
