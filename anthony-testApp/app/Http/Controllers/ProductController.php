<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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

        return view('Product_files.products', ['laptops' => $laptops]);
    }

    
}
