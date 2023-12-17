<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ComplaintController;
use App\Http\Controllers\Api\DealerController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\OfferController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StatusController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\ReasonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::POST('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::put('/changePassword', [AuthController::class, 'changePassword']);
    Route::post('/addLike/{id}', [LikeController::class, 'toggleLike']);
    Route::get('/getUserLikes', [ProductController::class, 'getUserLikes']);

    Route::post('/cardStore', [CartController::class, 'store']);
    Route::put('/cardUpdate', [CartController::class, 'update']);
    Route::delete('/cardRemove', [CartController::class, 'destroy']);
    Route::delete('/cardAllRemove', [CartController::class, 'destroyAll']);
    Route::get('/cards', [CartController::class, 'index']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::post('/orderStore', [OrderController::class, 'store']);
    Route::delete('/orderRemove/{order}', [OrderController::class, 'destroy']);

    Route::post('/products/{productId}/comments', [CommentController::class, 'store']);

    Route::get('/complaints', [ComplaintController::class, 'index']);
    Route::post('/complaintStore', [ComplaintController::class, 'store']);

});
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);
Route::get('productsByCategory', [ProductController::class, 'productsByCategory']);

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::get('categoriesWProducts', [CategoryController::class, 'categoriesWProducts']);
Route::get('categoryWProducts/{id}', [CategoryController::class, 'categoryWProducts']);

Route::get('offers', [OfferController::class, 'index']);

Route::get('plans', [PlanController::class, 'index']);

Route::get('statuses', [StatusController::class, 'index']);

Route::get('dealers', [DealerController::class, 'index']);

Route::get('cities', [CityController::class, 'index']);

Route::get('questions', [QuestionController::class, 'index']);

Route::get('payments', [PaymentController::class, 'index']);

Route::get('reasons', [ReasonController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
