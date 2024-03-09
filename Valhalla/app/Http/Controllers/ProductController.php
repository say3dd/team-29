<?php
//@noramknarf (Francis Moran) - getInfo() function
/* @KraeBM (Bilal Mohamed) worked on this page (pageupdate function) */
namespace App\Http\Controllers;

use App\Http\Controllers\BasketService\BasketInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller implements BasketInterface
{
//    public function productList()
//    {
//        //mistake fixed
//        $products = Product::all();
//        return view('product', compact('Product_files.product'));
//    }
    /** @BilalMo The page update page works on making sure the products are displayed a  */

    //
    public function pageUpdate(Request $request)
    {
      /** This retrieve the distinct data */
        $query = Product::query();
        $query->orderBy('brand', 'asc');
        $brands = $query->get();
        //$graphics = $this->getDistinctGPUs();

      /** This organises the sorting for the product page */
        $sorting = $request->input('sorting');
        $products = $this->sortLaptops($sorting);

        /** This handles the filtering side of the product page */
        $checkedbrands = $request->get('brand', []);
       // $checkedGPU = $request->get('graphics', []);
        /*If the filtered laptops contain these checked items, and it true, make only those visible when laptop is called **/
        $filteredLaptops = $this->filterLaptops($checkedbrands);
        if ($filteredLaptops) {
            $laptops = $filteredLaptops;
        }
        /* Return the rendered page with the details required to show**/
        return view('Product_files.productL' ,['brands'=>$brands, 'products'=>$products]);
        //dd($brands);
    }
    /** @BilalMo Assigns the product to get the distinct Brands  */
//    protected function getDistinctBrands()
//    {
//        return Product::select('brand')->distinct()->orderBy('brand')->get();
//    }
//    /** @BilalMo Assigns the product to get the distinct GPUs  */
//    protected function getDistinctGPUs() {
//        return Product::select('GPU')->distinct()->orderBy('GPU')->get();
//    }
//
//    /** @BilalMo Assigns the product to get the distinct prices  */
//    protected function getDistinctPrices() {
//        return Product::select('price')->distinct()->orderBy('price')->get();
//    }

        /** @BilalMo Renders the page if available by only the Id */


    /** @Bilal Mo Assigning operations for the sorting functions */
    protected function sortLaptops($sorting)
    {
        return match ($sorting) {
            "Price_LtoH" => Product::orderby('price', 'ASC')->paginate('12'),
            "Price_HtoL" => Product::orderby('price', 'Desc')->paginate('12'),
            "Newest-Arrival" => Product::orderby('created_at', 'Asc')->paginate(12),
            default => Product::all(),
        };
    }
    /** @BilalMo The function works on displaying the laptop based on certain conditionals whether the filter of the feature has been
     *pressed or not*/
    protected function filterLaptops($checkedbrands)
    {
        /**Assigning operations for if there are no filters chosen or
         * if both filters are chosen - here both selected in the request */

        if (!empty($checkedbrands)) {
           return Product::whereIn('brand', $checkedbrands)->get();
        }
    }

    public function getInfo(Request $request)
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();

        $laptopID = request()->input('laptopData'); //grabs specifically the section of the request that holds the laptop's ID
      if($laptopID != '' && Auth::id() != null){
       //     $product_data = DB::table('products')->where('product_id', $laptopID)->first();

////            $basket = Basket::create([
//                'user_id' => Auth::id(),
//                'product_id' => $laptopID,
//                'product_name' => $product_data->laptop_name,
//                'product_price' => $product_data->price,
//                'image_path' =>$product_data->image_path,
//                'RAM' => $product_data->RAM,
//                'GPU' => $product_data->GPU,
//                'processor' => $product_data->processor
//            ]);
            /* In summary, $laptopID is the id passed to the controller by the products page,
            $product_data is the entire row from the products table for that product, any info needed can be accessed with -> then the column name in the products table
            I would have rather kept the specs somewhere else to prevent clutter but it's slightly more reliable just expanding the table and passing as usual*/
       }
       $laptops = Product::all();
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
        $query = Product::query();
        $query->orderBy('Product_name');
        $products = $query->paginate(12);
         return view('Product_files.products', compact('products'));


    }
//    public function show($id)
//    {
//        $product = Product::find($id);
//        $laptops = Product::where('product_id', '!=', $id)->take(5)->get();
//        return view('Product_files.product', ['product' => $product, 'laptops' => $laptops]);
//    }
//

public function basket(){
    if (Auth::check()){
        return view('checkout.basket');
    }
    else{
        return redirect()->route('login');
    }
}

public function addToBasket($id){
    $product = Product::findOrFail($id);

    $basket = session()->get('basket', []);

    if (isset($basket[$id])) {
        $basket[$id]['quantity']++;

    }else{
        $basket[$id] = [
            "product_name" => $product->product_name,
            "images" => $product->images,
            "price" => $product->price,
            "quantity" => 1
        ];
    }

    session()->put('basket', $basket);
    return redirect()->back()->with('success', 'Item has been added to basket');
}

    public function updateBasket(Request $request){
        if ($request->id && $request->quantity){
            $basket = session()->get('basket');
            $basket[$request->id]["quantity"] = $request->quantity;
            session()->put('basket', $basket);
            session()->flash('success', 'Basket has been updated!');

        }

    }

//    public function removeFromBasket(Request $request)
//    {
//        if ($request->id){
//            $basket = session()->get('basket');
//            if (isset($basket[$request->id])){
//                unset($basket[$request->id]);
//                session()->put('basket', $basket);
//            }
//            session()->flash('success', 'Item has been removed!');
//        }
//    }

    public function removeFromBasket(Request $request){
        if ($request->id){
            $basket = session()->get('basket');
            if (isset($basket[$request->id])){
                unset($basket[$request->id]);
                session()->put('basket', $basket);
            }
            session()->flash('success', 'The item has been removed!');
        }

    }
//@BilalMo code for the search bar (not completed yet)
    public function search(){
        $search = request()->query('search');
if ($search){
    $laptops = Product::where('laptop_name','LIKE',"%{$search}%")
        ->orwhere('price','LIKE',"%{$search}%")
        ->orwhere('brand','LIKE',"%{$search}%")
        ->simplepaginate(12);
}else{
    $laptops = Product::simplePaginate(12);
}
$brands = Product::select('brand')->distinct()->orderBy('brand')->get();
//$graphics = $this->getDistinctGPUs();
return view('Product_files.products',compact('laptops','brands',));
    }



    // @say3dd (Mohammed Miah) Function to show a maximum of 4 products on the home page, namely the "Our Laptops" section./


    // @say3dd (Mohammed Miah) Function to allow us to see related products on the individual product details page

}


