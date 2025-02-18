<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\BookToRentController;
use App\Http\Controllers\BookToSellController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TrackBookPurchaseController;
use App\Http\Controllers\TrackActiveRentalBookController;
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Authors
Route::get('/authors', [AuthorController::class,'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);

//books-to-rent
Route::get('/rentalBooks', [BookToRentController::class,'index']);
Route::get('/rentalBooks/{id}', [BookToRentController::class, 'show']);

//books-to-sell
Route::get('/sellBooks', [BookToSellController::class,'index']);
Route::get('/sellBooks/{id}', [BookToSellController::class, 'show']);

//categories
Route::get('/categories', [CategoryController::class,'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);

//customers
Route::get('/customers', [CustomerController::class,'index']);
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/customers', [CustomerController::class, 'store']);

//orders
Route::get('/orders', [OrderController::class,'index']);
Route::get('/orders/{id}', [OrderController::class, 'show']);
Route::post('/orders', [OrderController::class, 'store']);

//transactions
Route::get('/transaction', [TransactionController::class,'index']);
Route::get('/transaction/{id}', [TransactionController::class, 'show']);

//wishlist
Route::get('/wishlist', [WishListController::class,'index']);
Route::get('/wishlist/{id}', [WishListController::class, 'show']);

//active-rental-books
Route::get('/activeRentalBooks', [TrackActiveRentalBookController::class,'index']);
Route::get('/activeRentalBooks/{id}', [TrackActiveRentalBookController::class, 'show']);

//purchases-books
Route::get('/purchasesBooks', [TrackBookPurchaseController::class,'index']);
Route::get('/purchasesBooks/{id}', [TrackBookPurchaseController::class, 'show']);

//members
Route::get('/members', [MemberController::class,'index']);
Route::get('/members/{id}', [MemberController::class, 'show']);
Route::post('/members', [MemberController::class, 'store']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});