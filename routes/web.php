<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;

Route::controller(FrontendController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/show_brand/{slug}', 'show_brand')->name('show.brand');
    Route::get('/show_group/{slug}', 'show_group')->name('show.group');
    Route::get('/product/{slug}', 'product_show')->name('product.show');
    Route::get('/search', 'search')->name('search');
});


Route::middleware('auth')->group(function () {
    Route::controller(HomeController::class)->group(function(){
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/brands/products/{brand}', 'brands_products')->name('brands.products');
        Route::get('/groups/products/{group}', 'groups_products')->name('groups.products');
        Route::get('/products/details/{product}', 'product_details')->name('products.details');
    });

    Route::controller(BrandController::class)->name('brands.')->prefix('brands')->group(function () {
        Route::post('/update-status/{brand}', 'updateStatus')->name('status.update');
    });
    Route::controller(GroupController::class)->name('groups.')->prefix('groups')->group(function () {
        Route::post('/update-status/{group}', 'updateStatus')->name('status.update');
    });
    Route::controller(ProductController::class)->name('products.')->prefix('products')->group(function () {
        Route::post('/update-status/{product}', 'updateStatus')->name('status.update');
        Route::get('/gallery/remove/{gallery}', 'galleryRemove')->name('gallery.remove');
        Route::get('/inventory/{product}', 'inventory')->name('inventory');
        Route::post('/add/inventory/{product}', 'inventory_store')->name('inventory.store');
        Route::get('/inventory/delete/{inventory}', 'inventory_delete')->name('inventory.delete');
    });
    Route::post('/getPrice',[ProductController::class, 'getPrice']);


    Route::resource('/brands', BrandController::class);
    Route::resource('/groups', GroupController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/profile', ProfileController::class);
    Route::resource('/sizes', SizeController::class);
    Route::resource('/users', UserController::class);

});





require __DIR__.'/auth.php';
