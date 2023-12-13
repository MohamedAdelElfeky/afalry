<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Image;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ProductAttribute;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */

class ProductController extends Controller
{

    public function index()
    {
        $paginate = \env('PAGINATE', 25);
        $products = Product::paginate($paginate);
        $categories = Category::whereNotNull('parent_id')->get();
        $plans = Plan::all();
        return view('pages.dashboards.products.index', ['products' => ProductResource::collection($products), 'categories' => $categories, 'plans' => $plans]);
    }

    public function sync()
    {
        $postData = ['BranchID' => 2];
        $response = Http::asForm()->post('https://fvtion.com/API/afirly/aljard.php', $postData);
        if ($response->successful()) {
            $data = $response->json();
            foreach ($data as $item) {
                Product::updateOrCreate(
                    ['product_erp' => $item['ID']],
                    [
                        'product_erp'  => $item['ID'],
                        'name'  => $item['Name'],
                        'price' => $item['Price'],
                        'balance' => $item['Balance'],
                    ]
                );
            }

            return response()->json(['message' => 'Sync successful']);
        } else {
            return response()->json(['error' => 'Failed to fetch data from the API'], $response->status());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'status' => 'nullable|in:active,inactive',
            'plans' => 'nullable|array',
            'plans.*' => 'exists:plans,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:8048',
            'product_attribute.*' => 'nullable|string',
            'product_value.*' => 'nullable|string',
        ]);

        $product =  Product::create($request->all());
        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $key => $item) {
                $image = $request->file('images')[$key];
                $imageType = $image->getClientOriginalExtension();
                $mimeType = $image->getMimeType();
                $file_name = time() . rand(0, 9999999999999) . '_product.' . $image->getClientOriginalExtension();
                $image->move(public_path('product/images/'), $file_name);
                $imagePath = "product/images/" . $file_name;
                $imageObject = new Image([
                    'url' => $imagePath,
                    'mime' => $mimeType,
                    'image_type' => $imageType,
                ]);
                $product->images()->save($imageObject);
            }
        }
        // Handle product attributes
        if ($request->has('product_attribute')) {
            foreach ($request->input('product_attribute') as $key => $value) {
                $productAttribute = new ProductAttribute([
                    'attribute' => $value,
                    'value' => $request->input('product_value')[$key],
                ]);
                $product->productAttributes()->save($productAttribute);
            }
        }

        return response()->json($product);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'nullable|numeric',
            'balance' => 'nullable|numeric',
            'status' => 'nullable|in:active,inactive',
            'plans' => 'nullable|array',
            'plans.*' => 'exists:plans,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:8048',
            'product_attribute.*' => 'nullable|string',
            'product_value.*' => 'nullable|string',
        ]);
        $product = Product::find($id);
        $product->update($request->all());

        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $imageId) {
                $image = Image::find($imageId);
                Storage::delete($image->url);
                $image->delete();
            }
        }
        if (request()->hasFile('images')) {
            foreach (request()->file('images') as $key => $item) {
                $image = $request->file('images')[$key];
                $imageType = $image->getClientOriginalExtension();
                $mimeType = $image->getMimeType();
                $file_name = time() . rand(0, 9999999999999) . '_product.' . $image->getClientOriginalExtension();
                $image->move(public_path('product/images/'), $file_name);
                $imagePath = "product/images/" . $file_name;
                $imageObject = new Image([
                    'url' => $imagePath,
                    'mime' => $mimeType,
                    'image_type' => $imageType,
                ]);
                $product->images()->save($imageObject);
            }
        }

        $product->productAttributes()->delete();
        
        if ($request->has('product_attribute')) {
            foreach ($request->input('product_attribute') as $key => $value) {
                $productAttribute = new ProductAttribute([
                    'attribute' => $value,
                    'value' => $request->input('product_value')[$key],
                ]);
                $product->productAttributes()->save($productAttribute);
            }
        }
        return response()->json(['message' => 'Product updated successfully']);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error deleting Product'], 500);
        }
    }

    public function updateProductStatus(Request $request)
    {
        $productId =  $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->status = $request->input('status');
        $product->save();

        return response()->json(['message' => 'Product updated successfully']);
    }
}
