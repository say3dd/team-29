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
 public function pageUpdate(Request $request,$id){
        if($id == 1){
            $laptops = Product::all();
            return view('FrontEnd.products',['laptops' => $laptops]);
        }elseif ($id == 2){
         return view('FrontEnd.products2');
        }
        elseif  ($id == 3) {
        return view('FrontEnd.products3');
        }
        else{
           return redirect()-> route('products');
        }

    }
    // displays all the products
    public function index()
    {
        $laptops = Product::all();

        return view('FrontEnd.products',['laptops' => $laptops]);
    }
    

    public function product(){
        return view('Product.product');
    }

}

