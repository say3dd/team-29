<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

route::get('/products', [ProductController::class, 'products']) -> name('products');
route::get('/', [HomeController::class, 'home']) -> name('home');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', function () {
    return view('FrontEnd/test');
});
// Route::get('/products', function () {
//     return view('FrontEnd/product');
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class,'index'])->name('home');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class, 'authHome'])->name('home');
});

Route::middleware('auth', 'admin')->group(function () {

    Route::get('/plist', function () {
        return view('Admin.ProductList');
    })->name('plist');
});


require __DIR__ . '/auth.php';
