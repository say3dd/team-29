<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();
        return view('product', compact('product'));
    }
    /** The page update page works on makign sure the products are displayed and each page works,  */
 public function pageUpdate(Request $request,$id){
    $q_brands = $request ->query("brands");

    $laptops = Product::when($q_brands, function ($query) use ($q_brands) {
        $brandsArray = explode(',', $q_brands);
        return $query->whereIn('brand', $brandsArray);
    })->get();
    $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();
    $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
switch($id){
case 1:
return view('FrontEnd.products', [
    'laptops' => $laptops,
    'brands' => $brands,
    'graphics' => $graphics,
    'q_brands' => $q_brands,
]);
case 2:
    return view('FrontEnd.products2', [
        'laptops' => $laptops,
        'brands' => $brands,
        'graphics' => $graphics,
        'q_brands' => $q_brands,
    ]);
    case 3:
        return view('FrontEnd.products3', [
            'laptops' => $laptops,
            'brands' => $brands,
            'graphics' => $graphics,
            'q_brands' => $q_brands,
        ]);
        default: 
         return redirect()->back();
}
}

    // displays all the products
    public function index(request $request)
    {
        
    }
    

    public function product(){
        return view('Product.product');
    }

}

