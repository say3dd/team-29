<?php
/*

    Author @BM786 Basit Ali Mohammad == worked on this page checkout summary and contact.
        @noramknarf (Francis Moran) - route to product.getInfo() and basket routes.
     */


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Basket\BasketController;
use App\Http\Controllers\Product\ReturnController;
use App\Http\Controllers\Basket\CheckoutController;
use App\Http\Controllers\Product\TrackingController;
use App\Http\Controllers\Product\ReturnRequestSubmitController;

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
    return view('Product_files.product');
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
    Route::get('/tracking', [TrackingController::class,'tracking'])->name('tracking');

    // Addded route function to the about page
    Route::get('/about', function (){return view('FrontEnd/about');})->name('about');

    // Route::get('/', );
    // @say3dd (Mohammed Miah) - Routing for the different product functionalities
    // @KraeBM (Bilal Mohamed) - Routing for product functionalities.
    Route::get('/product', [ProductController::class,'index'])->name('product');
    Route::get('add_to_basket/{id}', [ProductController::class, 'addToBasket'])->name('add_to_basket');
    Route::post('/product', [ProductController::class,'getInfo'])->name('product.getInfo');
    Route::get('/product/{id}', [ProductController::class, 'show'])->name('laptops.show');
    Route::get('/products/{id}',[ProductController::class,'pageUpdate']) -> name('productspage.id');



    Route::get('/contact', [ContactController::class, 'showForm'])->middleware(['guest'])->name('contact.show');
    Route::post('/contact', [ContactController::class, 'submitForm'])->middleware(['guest'])->name('contact.submit');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class,'authHome'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/productlist', [ProfileController::class, 'adminIndex']) ->name('ProductList');
});

//Route::group(['middleware' => 'cart.notEmpty'], function () {
//    Route::get('/checkout/summary', [CheckoutController::class, 'showSummary'])->name('checkout.summary');
//    Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
//    Route::get('/checkout/thankyou', function(){
//        return view('checkout.thankyou');
//    })->name('thank-you');
//});


Route::get('/return-request', [ReturnController::class, 'showReturnForm'])->name('return.request');

Route::post('/submit-return-request', [ReturnRequestSubmitController::class, 'submit'])->name('return.request.submit');

// Categories page -- change this soon
Route::get('/categories', function () {
    return view('FrontEnd.categories');
})->name('categories');

Route::get('/wishlist', [WishListController::class, 'index']);
Route::post('/add-to-wishlist',[WishListController::class, 'add'])->name('wishlist.add');
Route::post('/saveWishlistOrder', [WishlistController::class, 'saveOrder']
);

//--------------------- No code beyond this line. All routing code must be ABOVE THIS LINE. ^^^^^^________----------
require __DIR__ . '/auth.php';
//MUST NOT ANY CODE HERE.




