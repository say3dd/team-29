<?php
/* @KraeBM (Bilal Mohamed) worked on this page (pageupdate function) */
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function productList()
    {
        $products = Product::all();
        return view('product', compact('product'));
    }
    
 public function pageUpdate(Request $request,$id){
    /** Assigning the variables to the product coloums and making them distinct so theres no repetition */
    $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();
    $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
/** Assigning laptop as all products before its populated so laptop is definine din all tables before filled.*/

$laptops = Product::all();

/**Assigning opartions for if there are no filters chosen or 
 * if both filters are chosen - here both selected in the request */
$checkedBrands = $request-> get('brands',[]);
$checkedGPU = $request -> get('graphics',[]);

if(!empty($checkedBrands)&& !empty($checkedGPU)){
   $laptops =  Product::whereIn('brand',$checkedBrands)
        -> whereIn('GPU',$checkedGPU)->get();
}
elseif(!empty($checkedBrands)){
    $laptops = Product::whereIn('brand',$checkedBrands)->get();
}
elseif(!empty($checkedGPU)){
    $laptops = Product::whereIn('GPU',$checkedGPU)->get();
}
    /** The page update page works on makign sure the products are displayed and each page works,  */

switch($id){
case 1:
return view('FrontEnd.products', [
    'laptops' => $laptops,
    'brands' => $brands,
    'graphics' => $graphics,
]);
case 2:
    return view('FrontEnd.products2', [
        'laptops' => $laptops,
        'brands' => $brands,
        'graphics' => $graphics,
    ]);
    case 3:
        return view('FrontEnd.products3', [
            'laptops' => $laptops,
            'brands' => $brands,
            'graphics' => $graphics,
        ]);
        default: 
         return redirect()->back();
}
}

    // displays all the products
    public function index(request $request)
    {
        
    }
    

    public function product(){
        return view('Product.product');
    }

}

