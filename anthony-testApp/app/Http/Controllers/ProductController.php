<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList()
    {
        $products = ProductController::all();
        return view('products', compact('products'));
    }


    // directing user to the product page
    public function index(){
        if(Auth::user()){ 
            return view('Product.product');
        }
    }
}
