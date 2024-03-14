<?php
//@noramknarf (Francis Moran) - getInfo() function, redirect to login in basket()
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
                'GPU' => "/GPU: ([^,\n]+)/",
                'CPU' => "/Processor: ([^,\n]+)/",
                'RAM' => "/RAM: (\d+\s*GB)/i"
            ],
            'Mouse' => [
                'DPI' =>  "/DPI:\s*(\d+)/",
                'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
                'Battery Life'=> "/Battery Life:\s*([^\n,]+)/"
            ],
          'Keyboard' =>[
              'Switches' =>  "/Switches:\s*([^\n,]+)/",
              'Connectivity' => "/Connectivity:\s*([^\n,]+)/",
              'Type' => "/Keyboard Type:\s*([^\n,]+)/"
          ],
            'Monitor' => [
              'Screen Size' =>  "/Screen Size:\s*([^\n,]+)/",
              'Refresh Rate' => "/Refresh rate:\s*([^\n,]+)/",
               'Response Time' => "/Response Time\s*:\s*([^\n,]+)/"
          ],
            'Headset' => [
                'Connectivity' => "/Connectivity:\s*([^,\n]+)/",
                'Colour' => "/Colour:\s*([^,\n]+)/"
                ]
        ];
    }
    /** @Bilal MO - made the index code as well as all function linking to products ( categorypattern,patterns,brands etc) */

    public function index(Request $request)
    {
        // \Log::info('Request data:', $request->all());
        $category= $request->input('category','all');
        $query = Product::where('stock','>',0);

        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $categoryPatterns = $this->getCategoryPatterns($category);
        $productDesc = Product::where('category',$category)->distinct()->get()->pluck('product_description');
        $patterns = $category !== 'all' ? $categoryPatterns[$category] : [];
       // filter part
       // $filters = $this->extractFilters($productDesc,$patterns);
        // Applying the filters
       $query = $this->filterProducts($query, $request->input('brands', []));


        // Applying sorting
        $this->sortLaptops($query, $request->input('sorting'));
        // this paginates the page to 12 products
        $products = $query->paginate(12);

        //this loops the feature extraction function to display the features to all products
        foreach ($products as $product) {
            $product->features = $this->extractProductFeatures($product);
        }

        // Get distinct brands found within database
        $brands = $category !==  'all' ? Product::select('brand')->where('category', $category)->distinct()->orderBy('brand')
            ->get():Product::select('brand')->distinct()->orderBy('brand')->get();
        // Pass everything to be shown to the view
        return view('Product_files.products', compact('products','brands','category'));
    }
//@Bilal Mo extract filter was for the filtering part - kinda not needed rn since it doesnt work :/
//    protected function extractFilters($descriptions,$patterns)
//    {
//        $filters = [];
//      //  Log::debug('Descriptions:', $descriptions->toArray());
///**  Due to possible string errors , an error must be used to check whether it is a string or not to handle it correctly*/
//       // foreach ($patterns as $category => $attributePatterns) {
//            foreach ($patterns as $attribute => $pattern) {
//                // Ensure pattern is a string and is a valid regular expression
//                if (!is_string($pattern) || false === @preg_match($pattern, null)) {
//                    // Log the problem for the person coding to review and correct the issue.
//                    Log::warning("Invalid pattern for attribute {$attribute}: " . print_r($pattern, true));
//                    continue; // Skip this pattern
//                }
//
//                // Extract matches for each pattern
//                $matches = $descriptions->map(function ($desc) use ($pattern) {
//                    preg_match_all($pattern, $desc, $match);
//                    return $match[1] ?? null;
//                })->flatten()->filter()->unique()->values()->toArray();
//
//                if (!empty($matches)) {
//                    $filters[$attribute] = $matches;
//                }
//                Log::debug("Attribute: $attribute, Pattern: $pattern, Matches: " . print_r($matches, true));
//            }
//        //}
//        /**  Used these debugging to find what is produced from the filtering and patterns to check whether it got the data from the DB or not*/
//        Log::debug('Patterns used:', $patterns);
//        Log::debug('Filters extracted:', $filters);
//        return $filters;
//    }

/** This function works on extracting the featueres of the product and displaying it for each product
 * - shown in productL page so all products have small info below them for the
 user to see
 */
protected function extractProductFeatures($product){
    $category = $product->category;
    $categoryPatterns = $this->getCategoryPatterns($category)[$category];
    //placed in an array to contain the data obtained from DB to be displayed to the product paghe
    $features=[];

    foreach($categoryPatterns as $featureName => $pattern){
        //checks to match if the pattern and the product desc matches
       // if(is_string($pattern)) {
            preg_match($pattern, $product->product_description, $matches);
            //if the matches array isnt empty and if its correctly matches what been obtained in the array - in this case the product desc
            //then assings to features
            if (!empty($matches) && isset($matches[1])) {
                $features[$featureName] = $matches[1];
            }
      //  }else{
         //   Log::warning("Pattern for {$featureName} is not a string.");

        }
   // }
//return features and displays the result of the matching.
    return $features;
}

    /** @Bilal Mo Assigning operations for the sorting functions */
    protected function sortLaptops($query,$sorting)
    {
        return match ($sorting) {
            "Price_LtoH" => $query->orderby('price', 'ASC'),
            "Price_HtoL" => $query->orderby('price', 'DESC'),
           "Newest-Arrival" => $query->orderby('created_at', 'ASC'),
            default => $query,
        };
    }
    /** @BilalMo The function works on displaying the laptop based on certain conditionals whether the filter of the feature has been
     *pressed or not*/
    protected function filterProducts($query,$checkedbrands)//$filters)
    {
        $query->distinct();

        /**Assigning operations for if there are no filters chosen or
         * if both filters are chosen - here both selected in the request */
        // \Log::debug('Query before filters:', [$query->toSql(), $query->getBindings()]);

        if (!empty($checkedbrands)) {
            $query->whereIn('brand', $checkedbrands);
        }
//        foreach ($filters as $attribute => $values) {
//            if (!empty($values)) {
//                $query->where(function ($q) use ($values, $attribute) {
//                    foreach ($values as $value) {
//                        $q->orWhere('product_description', 'like', "%$attribute: $value%");
//                    }
//                });
//            }
//        }
//        $query->where(function ($q) use ($filters) {
//            foreach ($filters as $attribute => $values) {
//                if (!empty($values)) {
//                    $q->orWhere(function ($subq) use ($values, $attribute) {
//                        foreach ($values as $value) {
//                            // Modify the pattern to ensure it correctly matches the structured descriptions
//                            // Note: Adjust the pattern based on your exact formatting if necessary
//                            $pattern = "%{$attribute}: {$value}%";
//                            $subq->orWhere('product_description', 'LIKE', $pattern);
//                        }
//                    });
//                }
//            }
//        });
        //this is just a log to check the debug issue when getting Data for DB
       // \Log::debug('Final Query:', [$query->toSql(), $query->getBindings()]);
        return $query;
    }


    public function getInfo(Request $request)
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
      //  $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
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
    public function showlaptopinfo($id){
        $productDetails = Product::find($id);

        return view('Frontend.test',['product' => $productDetails]);
    }

    public function showotherproductinfo($id){
        $productDetails = Product::find($id);
        if (!$productDetails) {
            // Handle the case where the product is not found
            abort(404);
        }

        return view('Product_files.Monitor.Monitor',['product' => $productDetails]);
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

        if ($basket[$id]['quantity'] + 1 <= $basket[$id]['stock']) {
            $basket[$id]['quantity']++;
        } else {
            // Handle stock limitation (optional)
            // You can throw an exception, display an error message, etc.
            return redirect()->back()->withErrors('Failed', 'quantity exceeded the stock level');
        }

    } else{
        $basket[$id] = [
            "product_name" => $product->product_name,
            "images" => $product->images,
            "price" => $product->price,
            "quantity" => 1,
            "stock" => $product->stock,
        ];
        $basket[$id]['stock'] -= $basket[$id]['quantity'];
    }

    session()->put('basket', $basket);
    return redirect()->back()->with('success', 'Item has been added to basket');
}

    public function updateBasket(Request $request){
        if ($request->id && $request->quantity){
            $basket = session()->get('basket');

            if($basket[$request->id]["quantity"] < $basket[$request->id]["stock"] ){
                $basket[$request->id]["quantity"] = $request->quantity;
            } else {
                return redirect()->back()->withErrors('Failed', 'quantity exceeded the stock level');
            }


            session()->put('basket', $basket);

            session()->flash('success', 'Basket has been updated!');

        }
        return redirect()->back();
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


