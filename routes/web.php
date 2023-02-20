<?php

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('frontpage');

//Route::get('categori-{name}', [App\Http\Controllers\FrontendController::class, 'categori'])->where('name', '[a-zA-Z0-9-]+');

Route::get('/pizza/{id}', [App\Http\Controllers\FrontendController::class, 'show'])->name('pizza.show');
Route::post('/order/store', [App\Http\Controllers\FrontendController::class, 'store'])->name('order.store');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/pizza/{subcategory_id}', [App\Http\Controllers\PizzaController::class, 'index'])->name('pizza.index');
    Route::get('/pizza/{subcategory_id}/ekle', [App\Http\Controllers\PizzaController::class, 'create'])->name('pizza.create');
    Route::post('/pizza/{subcategory_id}', [App\Http\Controllers\PizzaController::class, 'store'])->name('pizza.store');
    Route::get('/pizza/{id}/duzenle', [App\Http\Controllers\PizzaController::class, 'edit'])->name('pizza.edit');
    Route::put('/pizza/{id}/update', [App\Http\Controllers\PizzaController::class, 'update'])->name('pizza.update');
    Route::delete('/pizza/{id}/delete', [App\Http\Controllers\PizzaController::class, 'destroy'])->name('pizza.destroy');

    Route::get('/kategori', [App\Http\Controllers\CategoryController::class, 'index'])->name("category.index");
    Route::get('/kategori/ekle', [App\Http\Controllers\CategoryController::class, 'create'])->name("category.create");
    Route::post('/kategori', [App\Http\Controllers\CategoryController::class, 'store'])->name("category.store");
    Route::get('/kategori/{id}/duzenle', [App\Http\Controllers\CategoryController::class, 'edit'])->name("category.edit");
    Route::put('/kategori/{id}/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
    Route::delete('/kategori/{id}/delete', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');

    Route::get('/alt-kategori/{category_id}', [App\Http\Controllers\SubCategoryController::class, 'index'])->name("subcategory.index");
    Route::get('/alt-kategori/{category_id}/ekle', [App\Http\Controllers\SubCategoryController::class, 'create'])->name("subcategory.create");
    Route::post('/alt-kategori/{category_id}', [App\Http\Controllers\SubCategoryController::class, 'store'])->name("subcategory.store");
    Route::get('/alt-kategori/{id}/duzenle', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name("subcategory.edit");
    Route::put('/alt-kategori/{id}/update', [App\Http\Controllers\SubCategoryController::class, 'update'])->name("subcategory.update");
    Route::delete('/alt-kategori/{id}/delete', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name("subcategory.destroy");

    //user order
    Route::get('/kullanici/siparisler', [App\Http\Controllers\UserOrderController::class, 'index'])->name('user.order');
    Route::get('export/', [App\Http\Controllers\UserOrderController::class, 'export'])->name('order.export');
    Route::get('/kullanici/siparisler/download-pdf', [App\Http\Controllers\UserOrderController::class, 'downloadPDF'])->name('order.downloadPDF');
    Route::post('/siparis/{id}/durum', [App\Http\Controllers\UserOrderController::class, 'changeStatus'])->name('order.status');

    //display all customers
    Route::get('/kullanicilar', [App\Http\Controllers\UserOrderController::class, 'customers'])->name('customers');


});
