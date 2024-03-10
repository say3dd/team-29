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
    /** @BilalMo The Index function works on making sure the products are displayed and that both the pagination,filtering and sorting
     *functionalities work */
    protected function getCategoryPatterns($category)
    {
        // Define your category specific patterns in a centralized method or configuration
        return [
            'Laptop' => [
                'gpus' => "/GPU: ([^,]+)/",
                'cpus' => "/Processor: ([^\n,]+)/",
                'rams' => "/RAM: (\d+\s*GB)/i"
            ]

          // ... other categories
        ];
    }

    public function index(Request $request)
    {
        $category= $request->input('category','all');
        $query = Product::query();

        if ($category !== 'all') {
            $query->where('category', $category);
        }

        $categoryPatterns = $this->getCategoryPatterns($category);

        $productDesc = Product::where('category',$category)->distinct()
            ->get()->pluck('product_description');
        //dd($productDesc);
        //
        $filters = $this->extractFilters($productDesc,$categoryPatterns);


        // Applying the filters
        $this->filterProducts($query,$request->input('brands', []),$filters);

        // Applying sorting
        $this->sortLaptops($query, $request->input('sorting'));

        // Get paginated products
        $products = $query->paginate(12);

        // Get distinct brands found within database
        $brands = Product::select('brand')->distinct()->orderBy('brand')->get();

        // Pass everything to be shown to the view
        return view('Product_files.products', compact('products','brands','filters','category'));
    }

    protected function extractFilters($descriptions,$patterns)
    {
        $filters = [];

        foreach ($patterns as $attribute => $pattern) {
            $filters[$attribute] = $descriptions
                ->map(function ($desc) use ($pattern,$attribute) {
                    preg_match_all($pattern, $desc, $matches);
                    return $matches[1] ?? null;
                })
                ->flatten()
                ->filter()
                ->unique()
                ->values()
                ->toArray();
        }
        return $filters;
    }


    /** @BilalMo Renders the page if available by only the Id */


    /** @Bilal Mo Assigning operations for the sorting functions */
    protected function sortLaptops($query,$sorting)
    {
        return match ($sorting) {
            "Price_LtoH" => $query->orderby('price', 'ASC'),
            "Price_HtoL" => $query->orderby('price', 'DESC'),
            "Newest-Arrival" => $query->orderby('created_at', 'ASC'),
            default => $query->orderby('product_name'),
        };
    }
    /** @BilalMo The function works on displaying the laptop based on certain conditionals whether the filter of the feature has been
     *pressed or not*/
    protected function filterProducts($query,$checkedbrands,$filters)
    {
        /**Assigning operations for if there are no filters chosen or
         * if both filters are chosen - here both selected in the request */

        if (!empty($checkedbrands)) {
            $query->whereIn('brand', $checkedbrands);
        }
        foreach ($filters as $attribute => $checkedValues) {
            if (!empty($checkedValues)) {
                $query->where(function ($q) use ($checkedValues, $attribute) {
                    foreach ($checkedValues as $value) {
                        $q->orWhere('product_description', 'like', "%$attribute: $value%");
                    }
                });
            }
        }

        return $query;
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
//    public function search(){
//        $search = request()->query('search');
//if ($search){
//    $products= Product::where('laptop_name','LIKE',"%{$search}%")
//        ->orwhere('price','LIKE',"%{$search}%")
//        ->orwhere('brand','LIKE',"%{$search}%")
//        ->simplepaginate(12);
//}else{
//    $laptops =
//}
//$brands = Product::select('brand')->distinct()->orderBy('brand')->get();
////$graphics = $this->getDistinctGPUs();
//return view('Product_files.products',compact('laptops','brands',));
//    }



    // @say3dd (Mohammed Miah) Function to show a maximum of 4 products on the home page, namely the "Our Laptops" section./


    // @say3dd (Mohammed Miah) Function to allow us to see related products on the individual product details page

}


