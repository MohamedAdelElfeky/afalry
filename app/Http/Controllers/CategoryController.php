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
      $categories = Category::all();
      return view('pages.dashboards.categories.index', [
         'categories' => CategoryResource::collection($categories),
      ]);
   }
}
