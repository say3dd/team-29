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




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/test', function () {
    return view('FrontEnd/test');
});

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('FrontEnd.landing');
    });

    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::get('/contactUs', function () {
        return view('FrontEnd/contactUs');
    });

    // Addded route function to the about page
    Route::get('/about', function () {
        return view('FrontEnd/about');
    });

    
});
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
Route::get('/', [ProductController::class, 'showHomeProducts']);
Route::get('/product', [ProductController::class, 'showProducts'])->name('product');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('laptops.show');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

require __DIR__ . '/auth.php';
