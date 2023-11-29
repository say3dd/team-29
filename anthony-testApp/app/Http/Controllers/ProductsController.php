<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    public function productList()
    {
        $products = Products::all();
        return view('products', compact('products'));
    }
}
