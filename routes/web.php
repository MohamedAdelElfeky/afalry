<?php

/**
 * create br eng mohamed Adel Elfeky 
 * email : mohamedelfeky1995@gmail.com 
 * phone : +201010152694
 */

use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('products', ProductController::class);
Route::resource('dealers', DealerController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cities', CityController::class);
Route::resource('plans', PlanController::class);
Route::resource('statuses', StatusController::class);
Route::resource('offers', OfferController::class);
Route::resource('orders', OrderController::class);
Route::resource('carts', CartController::class);
Route::resource('complaints', ComplaintController::class);
Route::resource('questions', QuestionController::class);

Route::post('updateProduct/status', [ProductController::class, 'updateProductStatus'])->name('update.product.status');


Route::match(['get', 'post'], 'products_sync', [ProductController::class, 'sync'])->name('products.sync.store');
Route::match(['get', 'post'], 'dealers_sync', [DealerController::class, 'sync'])->name('dealers.sync.store');
Route::match(['get', 'post'], 'cities_sync', [CityController::class, 'sync'])->name('cities.sync.store');
Route::match(['get', 'post'], 'status_sync', [StatusController::class, 'sync'])->name('status.sync.store');
Route::match(['get', 'post'], 'status_sync', [StatusController::class, 'sync'])->name('status.sync.store');
Route::post('updatePlan/free', [PlanController::class, 'updatePlanFree'])->name('update.plan.free');

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
