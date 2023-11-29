<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function productList()
    {
        $products = ProductsController::all();
        return view('products', compact('products'));
    }
}
