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

    public function products(){
        return view('FrontEnd.products');
    }

    // displays all the products
    public function index(){
        if(Auth::user()){ 
            return view('FrontEnd.products');
        }
    }
}
