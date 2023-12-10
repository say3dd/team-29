<?php
//@noramknarf (Francis Moran) - getInfo() function
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
    /* this function is used to show the product page **/
    public function pageUpdate(Request $request,$id){
        /** Assigning the variables to the product coloums and making them distinct so theres no repetition */
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();
    /** Assigning laptop as all products before its populated so laptop is definine din all tables before filled.*/
    
    $laptops = Product::all();
    
    /**Assigning opartions for if there are no filters chosen or 
     * if both filters are chosen - here both selected in the request */
    $checkedBrands = $request-> get('brands',[]);
    $checkedGPU = $request -> get('graphics',[]);
    
    /* if statements on whether both ticked or one ticked **/
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
        /** The page update page works on making sure the products are displayed and each page works,  */
    

    switch($id){
    case 1:
    return view('Product_files.products', [
        'laptops' => $laptops,
        'brands' => $brands,
        'graphics' => $graphics,
    ]);
    case 2:
        return view('Product_files.products2', [
            'laptops' => $laptops,
            'brands' => $brands,
            'graphics' => $graphics,
        ]);
        case 3:
            return view('Product_files.products3', [
                'laptops' => $laptops,
                'brands' => $brands,
                'graphics' => $graphics,
            ]);
            default: 
             return redirect()->back();
    }
    }
    public function getInfo()
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();

        $laptopID = request()->input('laptopData'); //grabs specifically the section of the request that holds the laptop's ID
        if($laptopID != '' && Auth::id() != null){
            $product_data = DB::table('products')->where('product_id', $laptopID)->first();

            $basket = Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $laptopID,
                'product_name' => $product_data->laptop_name,
                'product_price' => $product_data->price,
                'image_path' =>$product_data->image_path,
                'RAM' => $product_data->RAM,
                'GPU' => $product_data->GPU,
                'processor' => $product_data->processor
            ]);
            /* In summary, $laptopID is the id passed to the controller by the products page,
            $product_data is the entire row from the products table for that product, any info needed can be accessed with -> then the column name in the products table
            I would have rather kept the specs somewhere else to prevent clutter but it's slightly more reliable just expanding the table and passing as usual*/
       }
       
        $laptops = Product::all();
        return view('Product_files.products', ['laptops' => $laptops, 'productToAdd' => $laptopID,'brands' => $brands,'graphics'=> $graphics]);
    }

    // displays all the products
    public function index()
    {
        $laptops = Product::paginate(12);
         return view('Product_files.product', compact('laptops'));
        
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
    
    
