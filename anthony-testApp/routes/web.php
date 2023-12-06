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




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/', function () {
    return view('FrontEnd/home'); })->name('index');


Route::get('/contactUs', function () {
    return view('FrontEnd/contactUs');
});


Route::get('/test', function () {
    return view('FrontEnd/test');
});

Route::get('/product', [ProductController::class,'index'])->name('product');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
   
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('laptops.show');

require __DIR__ . '/auth.php';
