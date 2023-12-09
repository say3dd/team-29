<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
<<<<<<< HEAD
use App\Http\Controllers\CheckoutController;
=======
use App\Http\Controllers\BasketController;
>>>>>>> 274730d1756d6dc77c97c1d5e8164346526f17f0

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
Route::get('/', [HomeController::class, 'index']);

Route::get('/test', function () {
    return view('FrontEnd.test');
});

Route::get('/product', [ProductController::class,'index'])->name('product');
Route::post('/product', [ProductController::class,'getInfo'])->name('product.getInfo'); 
/*
The second route here sometimes overrides the first one (possibly something causing the buttons to trigger without an input).
For now I've made a workaround by having the getInfo function check if it has recieved an input, if not it behaves just like the index function.
if anybody could let me (Francis) know of a better way to do this, I'd gladly appreciate it.
*/

Route::get('/basket', [BasketController::class,'contents'])->name('basket');
Route::post('/basket', [BasketController::class,'removeItem'])->name('basket.remove');
Route::get('/test1', function () {
    return view('FrontEnd.cart');
});


    Route::get('/index', [HomeController::class,'index'])->name('index');
    Route::get('/contactUs',[ContactController::class,'contact'])->name('contactUs');;

    // Addded route function to the about page
    Route::get('/about', function (){return view('FrontEnd/about');})->name('about');

    // Route::get('/', );
    Route::get('/product', [ProductController::class,'index'])->name('product');
    Route::post('/product', [ProductController::class,'getInfo'])->name('product.getInfo'); 
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('laptops.show');

    Route::get('/contact', [ContactController::class, 'showForm'])->middleware(['guest'])->name('contact.show');
    Route::post('/contact', [ContactController::class, 'submitForm'])->middleware(['guest'])->name('contact.submit');

<<<<<<< HEAD
=======

>>>>>>> 274730d1756d6dc77c97c1d5e8164346526f17f0
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class,'authHome'])->name('home');
});

<<<<<<< HEAD
Route::middleware(['auth', 'admin'])->group(function () {
=======
Route::middleware('auth','admin')->group(function () {

>>>>>>> 274730d1756d6dc77c97c1d5e8164346526f17f0
    Route::get('/plist', function () {
        return view('Admin.ProductList');
    })->name('plist');
});

<<<<<<< HEAD
Route::group(['middleware' => 'cart.notEmpty'], function () {
    Route::get('/checkout/summary', [CheckoutController::class, 'showSummary'])->name('checkout.summary');
    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
});
=======
    Route::get('/index', [HomeController::class, 'index'])->name('index');

>>>>>>> 274730d1756d6dc77c97c1d5e8164346526f17f0

require __DIR__ . '/auth.php';

