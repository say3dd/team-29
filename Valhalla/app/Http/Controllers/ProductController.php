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
use Illuminate\Support\Facades\Log;

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
        // Define the specific patterns used in the database and forms regular expressions to obtain them correctly.
        return [
            'Laptop' => [
                'gpus' => "/GPU: ([^,\n]+)/",
                'cpus' => "/Processor: ([^,\n]+)/",
                'rams' => "/RAM: (\d+\s*GB)/i"
            ],
            'Mouse' => [
                'dpis' =>  "/DPI:\s*(\d+)/",
                'connectivity' => "/Connectivity:\s*([^\n,]+)/",
                'Battery'=> "/Battery Life:\s*([^\n,]+)/"
            ],
          'Keyboard' =>[
              'switch' =>  "/Switches:\s*([^\n,]+)/",
              'connectivity' => "/Connectivity:\s*([^\n,]+)/",
              'types' => "/Type:\s*([^\n,]+)/"
          ],
            'Monitor' => [
              'screens' =>  "/Screen Size:\s*([^\n,]+)/",
              'refresh' => "/Refresh rate:\s*([^\n,]+)/",
               'times' => "/Response Time\s*:\s*([^\n,]+)/"
          ]
          // ... other categories
        ];
    }
    /** @Bilal MO - made the index code as well as all function linking to products ( categorypattern,patterns,brands etc) */

    public function index(Request $request)
    {
        \Log::info('Request data:', $request->all());
        $category= $request->input('category','all');
        $query = Product::query();

        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $categoryPatterns = $this->getCategoryPatterns($category);
        $productDesc = Product::where('category',$category)->distinct()
            ->get()->pluck('product_description');
        $products = $query->paginate(12);
        $patterns = $category !== 'all' ? $categoryPatterns[$category] : [];
        //filter part
        $filters = $this->extractFilters($productDesc,$patterns);
        // Applying the filters
        $this->filterProducts($query,$request->input('brands', []),$filters);

        // Applying sorting
        $this->sortLaptops($query, $request->input('sorting'));
        // this paginates the page to 12 products

        // Get distinct brands found within database
        $brands = $category !==  'all' ? Product::select('brand')->where('category', $category)->distinct()->orderBy('brand')
            ->get():Product::select('brand')->distinct()->orderBy('brand')->get();
        // Pass everything to be shown to the view

        return view('Product_files.products', compact('products','brands','filters','category'));
    }
//@Bilal Mo
    protected function extractFilters($descriptions,$patterns)
    {
        $filters = [];
      //  Log::debug('Descriptions:', $descriptions->toArray());
/**  Due to possible string errors , an error must be used to check whether it is a string or not to handle it correctly*/
       // foreach ($patterns as $category => $attributePatterns) {
            foreach ($patterns as $attribute => $pattern) {
                // Ensure pattern is a string and is a valid regular expression
                if (!is_string($pattern) || false === @preg_match($pattern, null)) {
                    // Log the problem for the person coding to review and correct the issue.
                    Log::warning("Invalid pattern for attribute {$attribute}: " . print_r($pattern, true));
                    continue; // Skip this pattern
                }

                // Extract matches for each pattern
                $matches = $descriptions->map(function ($desc) use ($pattern) {
                    preg_match_all($pattern, $desc, $match);
                    return $match[1] ?? null;
                })->flatten()->filter()->unique()->values()->toArray();

                if (!empty($matches)) {
                    $filters[$attribute] = $matches;
                }
            }
        //}
        /**  Used these debugging to find what is produced from the filtering and patterns to check whether it got the data from the DB or not*/
        Log::debug('Patterns used:', $patterns);
        Log::debug('Filters extracted:', $filters);
        return $filters;
    }


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
       // \Log::debug('Query before filters:', [$query->toSql(), $query->getBindings()]);

        if (!empty($checkedbrands)) {
            $query->whereIn('brand', $checkedbrands);
        }
        foreach ($filters as $attribute => $values) {
            if (!empty($values)) {
                //$query->where(function ($q) use ($values, $attribute) {
                    foreach ($values as $value) {
                        // Adjust the query to match the attribute and value correctly
                        $query->orWhere('product_description', 'like', "%$attribute: $value%");
                    }
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


