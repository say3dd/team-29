<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function productList()
    {
        $products = ProductController::all();
        return view('product', compact('product'));
    }

    public function getInfo()
    {
        $laptopID = request()->input('laptopData'); //grabs specifically the section of the request that holds the laptop's ID
        if($laptopID != '' && Auth::id() != null){
            $product_data = DB::table('products')->where('product_id', $laptopID)->first();

            $basket = Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $laptopID,
                'product_name' => $product_data->laptop_name,
                'product_price' => $product_data->price
            ]);
       }
       
        $laptops = Product::all();
        return view('Product_files.products', ['laptops' => $laptops, 'productToAdd' => $laptopID]);
    }

    // displays all the products
    public function index(){
        if(Auth::user()){ 
            return view('Product.product');
        }
    }

    
}
