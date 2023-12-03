<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList()
    {
        $products = ProductController::all();
        return view('product', compact('product'));
    }


    // displays all the products
    public function index()
    {
        $laptops = Product::all();

        return view('FrontEnd.products', ['laptops' => $laptops]);
    }

    
}
