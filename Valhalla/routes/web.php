<?php
/*

    Author @BM786 Basit Ali Mohammad == worked on this page.
        @noramknarf (Francis Moran) - route to product.getInfo() and basket routes.
     */




use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\Product\ReturnController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Basket\CheckoutController;
use App\Http\Controllers\Product\TrackingController;
use App\Http\Controllers\WishListController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Product\ReturnRequestSubmitController;
use App\Http\Middleware\CheckCartNotEmpty;

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

//Route::get('/products', [ProductController::class,'index'])->name('products.index');
//Route::get('/product', [ProductController::class,'getInfo'])->name('product.getInfo');
////Route::get('/products/update', [ProductController::class,'pageUpdate'])->name('products.update');

//
/*
The second route here sometimes overrides the first one (possibly something causing the buttons to trigger without an input).
For now I've made a workaround by having the getInfo function check if it has recieved an input, if not it behaves just like the index function.
if anybody could let me (Francis) know of a better way to do this, I'd gladly appreciate it.
*/

//Route::get('/basket', [BasketController::class,'contents'])->name('basket');
//Route::post('/basket', [BasketController::class,'removeItem'])->name('basket.remove');

//New Basket code




Route::get('/test1', function () {
    return view('FrontEnd.cart');
});


    Route::get('/index', [HomeController::class,'index'])->name('index');
    Route::get('/contactUs',[ContactController::class,'contact'])->name('contactUs');;
    Route::get('/tracking', [TrackingController::class,'tracking'])->name('tracking');

    // Addded route function to the about page
    Route::get('/about',[HomeController::class, 'about'])->name('about');

    // @say3dd (Mohammed Miah) - Routing for the different product functionalities
    // @KraeBM (Bilal Mohamed) - Routing for product functionalities.
    Route::get('/products', [ProductController::class,'index'])->name('products.index');
    Route::get('/product/laptops/{id}', [ProductController::class, 'showlaptopInfo'])->name('product.laptopInfo');
    Route::get('product/other/{id}',[ProductController::class, 'showotherproductInfo'])->name('product.otherInfo');
//    Route::get('/products', [ProductController::class, 'show'])->name('products.show');
Route::post('/product', [ProductController::class,'getInfo'])->name('product.getInfo');

//refactored
    Route::middleware('guest')->group(function () {
        Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');
        Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');
    });


    // Any user authentication route can be inside this group function

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class,'authHome'])->name('home');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'orderHistory'])->name('dashboard');



    //routes for wishlists moved here for user authentication
    Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist');
    Route::post('/add-to-wishlist',[WishListController::class, 'add'])->name('wishlist.add');
    Route::post('/saveWishlistOrder', [WishlistController::class, 'saveOrder']);
    Route::delete('/wishlist/{id}', [WishListController::class, 'remove'])->name('wishlist.remove');



    //Route::get('/basket', [ProductController::class,'contents'])->name('basket');
    Route::get('basket', [ProductController::class,'basket'])->name('basket');
    Route::patch('update-basket', [ProductController::class, 'updateBasket'])->name('update_basket');
    Route::delete('remove-from-basket', [ProductController::class,'removeFromBasket'])->name('remove_from_basket');
    Route::get('add_to_basket/{id}', [ProductController::class, 'addToBasket'])->name('add_to_basket');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/plist', function () {
        return view('Admin.ProductList');
    })->name('plist');
});

Route::group(['middleware' => 'cart.notEmpty'], function () {
   Route::get('/checkout/summary', [CheckoutController::class, 'showSummary'])->name('checkout.summary');
   Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
    Route::get('/checkout/thankyou', function(){
        return view('checkout.thankyou');
    })->name('thank-you');
});



Route::get('/return-request', [ReturnController::class, 'showReturnForm'])->name('return.request');

Route::post('/submit-return-request', [ReturnRequestSubmitController::class, 'submit'])->name('return.request.submit');

Route::get('/categories', function () {
    return view('FrontEnd.categories');
})->name('categories');
Route::get('/search/products', [ProductController::class, 'search']) ->name('categories.search');
Route::get('/product/{id}', [ProductController::class, 'show']);




//************************************NO CODE BEYOND THIS LINE**************************
require __DIR__ . '/auth.php';

