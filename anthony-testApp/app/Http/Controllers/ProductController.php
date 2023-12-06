<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList()
    {
        $products = ProductController::all();
        return view('product', compact('product'));
    }

    public function getInfo()
    {
        $testVar = request();
        $laptops = Product::all();
       // $testvar = productToGrab;
        return view('FrontEnd.products', ['laptops' => $laptops, 'productToAdd' => $testVar]);
    }

    // displays all the products
    public function index(){
        if(Auth::user()){ 
            return view('Product.product');
        }
    }

    
}
