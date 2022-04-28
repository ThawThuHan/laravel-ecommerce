<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Models\CartItem;
use App\Models\MainCategory;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/categories/{category}', [HomeController::class, 'getProductByCategory']);
Route::get('/products/{product}', [HomeController::class, 'detailProduct']);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartItemController::class, "index"]);
    Route::post('/cart/add', [CartItemController::class, "store"]);
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);

    // Route::get('/category', [MainCategoryController::class, 'index'])->name('category.index');
    // Route::get('/category/create', [MainCategoryController::class, 'create'])->name('category.create');
    // Route::post('/category/store', [MainCategoryController::class, 'store'])->name('category.store');
    // Route::get('/category/{mainCategory}/edit', [MainCategoryController::class, 'edit'])->name('category.edit');
    // Route::put('/category/{mainCategory}', [MainCategoryController::class, 'update'])->name('category.update');
    // Route::delete('/category/{mainCategory}', [MainCategoryController::class, 'destroy'])->name('category.delete');

    Route::resource('category', MainCategoryController::class);
    Route::resource('category.sub-category', SubCategoryController::class)->shallow();

    Route::get('/sub-categories/get', [SubCategoryController::class, 'getSubCategory']);

    Route::resource('products', ProductController::class);
});
