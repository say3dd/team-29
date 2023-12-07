<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;

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
        if($laptopID != ''){
            $basket = Basket::create();
       }
       
        $laptops = Product::all();
        return view('FrontEnd.products', ['laptops' => $laptops, 'productToAdd' => $laptopID]);
    }

    // displays all the products
    public function index()
    {
        $laptops = Product::all();

        return view('FrontEnd.products', ['laptops' => $laptops]);
    }
}
