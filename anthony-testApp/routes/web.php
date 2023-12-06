<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::get('/', [HomeController::class, 'home']) -> name('home');
route::get('/products_page', [ProductController::class, 'product']) ->  name('product');
Route::get('/products/{id}',[ProductController::class,'pageUpdate']) -> name('productspage.id');

Route::get('/contactUs', function () {
    return view('FrontEnd/contactUs');
})-> name('contact.Us');


Route::get('/test', function () {
    return view('FrontEnd/test');
});
// Route::get('/products', function () {
//     return view('FrontEnd/product');
// });

Route::get('/product', [ProductController::class,'index'])->name('product');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class,'index'])->name('home');
   
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('laptops.show');

require __DIR__ . '/auth.php';

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

