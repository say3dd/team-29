<?php
//@noramknarf (Francis Moran) - getInfo() function
/* @KraeBM (Bilal Mohamed) worked on this page (pageupdate function) */
namespace App\Http\Controllers\Product;

use App\Http\Controllers\Basket\BasketService\BasketInterface;
use App\Http\Controllers\Controller;
use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller implements BasketInterface
{
//  public function productList()
//   {
//       //mistake fixed
//       $products = Product::all();
//      return view('product', compact('products'));
//   }
    /* this function is used to show the product page **/
    public function pageUpdate(Request $request,$id){
        /** Assigning laptop as all products before its populated so laptop is definine din all tables before filled.*/

        $products = Product::all();
        /** Assigning the variables to the product coloums and making them distinct so theres no repetition */
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();


    /**Assigning opartions for if there are no filters chosen or
     * if both filters are chosen - here both selected in the request */
    $checkedBrands = $request-> get('brands',[]);
    $checkedGPU = $request -> get('graphics',[]);

    /* if statements on whether both ticked or one ticked **/
    if(!empty($checkedBrands)&& !empty($checkedGPU)){
       $products =  Product::whereIn('brand',$checkedBrands)
            -> whereIn('GPU',$checkedGPU)->get();
    }
    elseif(!empty($checkedBrands)){
        $products = Product::whereIn('brand',$checkedBrands)->get();
    }
    elseif(!empty($checkedGPU)){
        $products = Product::whereIn('GPU',$checkedGPU)->get();
    }
        /** The page update page works on making sure the products are displayed and each page works,  */


    switch($id){
    case 1:
    return view('Product_files.products', [
        'products' => $products,
        'brands' => $brands,
        'graphics' => $graphics,
    ]);
    case 2:
        return view('Product_files.products2', [
            'products' => $products,
            'brands' => $brands,
            'graphics' => $graphics,
        ]);
        case 3:
            return view('Product_files.products3', [
                'products' => $products,
                'brands' => $brands,
                'graphics' => $graphics,
            ]);
            default:
             return redirect()->back();
    }
    }
    public function getInfo(Request $request)
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $graphics = Product::select('GPU')->distinct()-> orderby('GPU')-> get();

        $productID = request()->input('productData'); //grabs specifically the section of the request that holds the laptop's ID
        if($productID != '' && Auth::id() != null){
            $product_data = DB::table('products')->where('product_id', $productID)->first();

            $basket = Basket::create([
                'user_id' => Auth::id(),
                'product_id' => $productID,
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
          $products = Product::all();
       /*Scroll position set to the poisition of the user input */
       /*Sets the restore scroll originally to true, if its true, then page refreshes from the top, if not continues by using
       the saved Scroll positon */
       $scrollPosition = $request->input('scrollPosition');
       session(['scrollPosition' => $scrollPosition, 'restoreScroll' => true]);
       return redirect()->back();
    }

    // @say3dd (Mohammed Miah) displays all the products, maximum of 12 on the products page
    public function index()
    {
        $products = Product::paginate(12);
         return view('Product_files.product', compact('products'));

    }



    // @say3dd (Mohammed Miah) Function to show a maximum of 4 products on the home page, namely the "Our Laptops" section.


    // @say3dd (Mohammed Miah) Function to allow us to see related products on the individual product details page
    public function show($id)
    {
        $product = Product::find($id);
        $products = Product::where('product_id', '!=', $id)->take(5)->get();
        return view('Product_files.product', ['product' => $product, 'products' => $products]);
    }

    public function addToBasket($id)
    {
        $product = Product::findOrFail($id);

        $basket = session()->get('basket', []);

        if (isset($basket[$id])){
            $basket[$id]['quantity']++;

        }else{
            $basket[$id] = [
                "laptop_name" => $product->product_name,
//                "image_path" => $product->images
                  "price" => $product->price,
                "quantity" => 1
                ];
        }

        session()->put('basket', $basket);
        $message="Item has been added to basket";
        return redirect()->back()->with('success', $message);
    }

}


