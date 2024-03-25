<?php
/*
@AbuIsNotHer3 @BravoBoy2 === The same person (Abubakarsiddik ) worked on this page alone
*/
namespace App\Http\Controllers;

use App\Http\Controllers\BasketService\BasketInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Services\ProductService;

// use App\Models\User;


class HomeController extends Controller implements BasketInterface
{
    protected $productService;
    public function __construct( ProductService $productService) {
        $this->productService = $productService;
    }

//  \\  use Controllers\ProductController;

    /*user will be redirected to either home page or admin page based on the current user.
    If the user has "admin" on the usertype field then they will be redirected admin dashboard page
    and to home page from if they are just "user"
    */
    public function authHome(){
        if(Auth::id()){
        $usertype = Auth::user()->usertype;


        switch($usertype){
            case 'admin':
                return view('Admin.adminDashboard');
                break;

            case 'user':
                return view('dashboard');
                break;
            default:
                return redirect()->back();
                break;
        }

        }
    }

    public function addToBasket($id){}


/** @KraeBM (Bilal Mohamed) this is the index displaying the products in the home page - used for the random products specifically */
    public function index(Product $product){
        //assigns it to 3 items
        $product = $product->orderBy('product_name','asc')->paginate(3);
        //calls the randomProducts Function
        $randomProducts = $this->getRandomProducts();
        //this loops the feature extraction function to display the features to those 3 products in the homepage
        foreach ($product as $prod) {
            $prod->features = $this->productService->extractProductFeatures($prod);
        }
        //this loops it so the random items that appear also have product features
        foreach ($randomProducts as $randomProduct) {
            $randomProduct->features = $this->productService->extractProductFeatures($randomProduct);
        }
        return view('FrontEnd.home', ['products' => $product,'category' =>'$category','randomProducts' => $randomProducts]);
    }
    /** @KraeBM (Bilal Mohamed) This is the function which obtains the random products */
    public function getRandomProducts(){
        //assigning a value to get the products which have a stock>0 , taking at most thirty and showing only 3 products.
        $randomProducts = Product::where('stock', '>', 0)
            ->take(30)
            ->get()
            ->random(3);

            return $randomProducts;

    }

    public function about(){
        return view('FrontEnd.about');
    }

}
