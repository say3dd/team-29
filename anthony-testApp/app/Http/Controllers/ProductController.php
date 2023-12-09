<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        }
    }

    // displays max of 12 products
    public function showProducts()
    {
        $laptops = Product::paginate(12);

        return view('Product_files.products', ['laptops' => $laptops]);
        
    }

    public function showHomeProducts()
    {
        $laptops = Product::paginate(4);
        return view('FrontEnd.home', ['laptops' => $laptops]);
    }

    public function show($id)
    {
        $laptop = Product::find($id);
        $laptops = Product::where('product_id', '!=', $id)->take(5)->get();
        return view('Product_files.product', ['product' => $laptop, 'laptops' => $laptops]);
    }

}
    
    
