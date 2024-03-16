<?php
//@noramknarf (Francis Moran) - getInfo() function, redirect to login in basket(), image handling in showlaptopinfo
/* @KraeBM (Bilal Mohamed) worked on this page (pageupdate function) */
namespace App\Http\Controllers;

use App\Http\Controllers\BasketService\BasketInterface;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Basket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use MongoDB\Driver\Query;
use App\Services\ProductService;


class ProductController extends Controller implements BasketInterface
{
   //Used ProductService as a service that both homecontroller and productController can use to extract
    //data into the product side of the home page since duplicating code will mess code up.
    protected $productService;
    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }
//    public function productList()
//    {
//        //mistake fixed
//        $products = Product::all();
//        return view('product', compact('Product_files.product'));
//    }

    /** @Bilal MO - made the index code as well as all functions revolving to products/product page */
    public function index(Request $request)
    {
        // \Log::info('Request data:', $request->all());
        $category = $request->input('category', 'all');
        $query = Product::where('stock', '>', 0);

        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $categoryPatterns = $this->productService->getCategoryPatterns($category);
        $productDesc = Product::where('category', $category)->distinct()->get()->pluck('product_description');
        $patterns = $category !== 'all' ? $categoryPatterns[$category] : [];
        // filter part
         $filters = $this->extractFilters($productDesc,$patterns);
        // Applying the filters
        $query = $this->filterProducts($query, $request->input('brands', []),$filters);


        // Applying sorting
        $this->sortLaptops($query, $request->input('sorting'));
        // this paginates the page to 12 products
        $products = $query->paginate(12);

        //this loops the feature extraction function to display the features to all products
        foreach ($products as $product) {
            $product->features = $this->productService->extractProductFeatures($product);
        }

        // Get distinct brands found within database
        $brands = $category !== 'all' ? Product::select('brand')->where('category', $category)->distinct()->orderBy('brand')
            ->get() : Product::select('brand')->distinct()->orderBy('brand')->get();
        // Pass everything to be shown to the view
        return view('Product_files.products', compact('products', 'brands','filters', 'category'));
    }
/**  @Bilal Mo extract filter was for the filtering part - kinda not needed rn since it doesnt work :/ */
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
                Log::debug("Attribute: $attribute, Pattern: $pattern, Matches: " . print_r($matches, true));
            }
        //}
        /**  Used these debugging to find what is produced from the filtering and patterns to check whether it got the data from the DB or not*/
        Log::debug('Patterns used:', $patterns);
        Log::debug('Filters extracted:', $filters);
        return $filters;
    }
    /** @Bilal Mo Assigning operations for the sorting functions */
    protected function sortLaptops($query, $sorting)
    {
        return match ($sorting) {
            "Price_LtoH" => $query->orderby('price', 'ASC'),
            "Price_HtoL" => $query->orderby('price', 'DESC'),
            "Newest-Arrival" => $query->orderby('created_at', 'ASC'),
            default => $query,
        };
    }

    /** @BilalMo The function works on displaying the laptop based on certain conditionals whether the filter of the feature has been
     *pressed or not - other part for the flexible filter doesnt work so "//" for now*/
    protected function filterProducts($query, $checkedbrands,$filters)
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
        $query->where(function ($q) use ($filters) {
            foreach ($filters as $attribute => $values) {
                if (!empty($values)) {
                    $q->orWhere(function ($subq) use ($values, $attribute) {
                        foreach ($values as $value) {
                            // Modify the pattern to ensure it correctly matches the structured descriptions
                            // Note: Adjust the pattern based on your exact formatting if necessary
                            $pattern = "%{$attribute}: {$value}%";
                            $subq->orWhere('product_description', 'LIKE', $pattern);
                        }
                    });
                }
            }
        });
        //this is just a log to check the debug issue when getting Data for DB
        // \Log::debug('Final Query:', [$query->toSql(), $query->getBindings()]);
        return $query;
    }


    public function getInfo(Request $request)
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
        //  $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $laptopID = request()->input('laptopData'); //grabs specifically the section of the request that holds the laptop's ID
        if ($laptopID != '' && Auth::id() != null) {
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

    /** @BilalMo displays the laptop info - also makes sure the related products change when refreshing - will make it change after 5-10s to make it cooler */
    public function showlaptopinfo($id)
    {
        $productDetails = Product::find($id);
        $relatedProducts = $this->getRelatedProducts($id, $productDetails->category);
        $productDetails->features = $this->productService->extractProductFeatures($productDetails);
//loops thru the related products part to show each ind product data
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProduct->features = $this->productService->extractProductFeatures($relatedProduct);
        }
        
        $images = DB::table('images')->get()->where('product_id', $id);
        return view('Frontend.test',['product' => $productDetails, 'relatedProducts' => $relatedProducts, 'images' => $images]);
    }
/** @Bilal Mo works on showing the individual product pages using the id */
    public function showotherproductinfo($id)
    {
        $productDetails = Product::find($id);
        if (!$productDetails) {
            // Handle the case where the product is not found
            abort(404);
        }
        $relatedProducts = $this->getRelatedProducts($id, $productDetails->category);
        $productDetails->features = $this->productService->extractProductFeatures($productDetails);
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProduct->features = $this->productService->extractProductFeatures($relatedProduct);
        }
        return view('Product_files.Monitor.Monitor',['product' => $productDetails, 'relatedProducts' => $relatedProducts]);
    }

    /**@Bilal implements a randomizer for the related products, showing diff products every time */
public function getRelatedProducts($currentProductId,$category)
{
    $relatedProducts = Product::where('product_id', '!=', $currentProductId)
                        ->where('category',$category)
    ->where('stock','>',0)
    ->take(12)
    ->get()
//        HAD TO MAKE IT TWO FOR LACK OF PRODUCTS, WHEN U ADD MORE DUMMY DATA, CHANGE IT TO 4
    ->random(2); //Will make this 4 when theres enough products available
    return $relatedProducts;
}


    // @say3dd (Mohammed Miah) displays all the products, maximum of 12 on the products page

//    public function show($id)
//    {
//        $product = Product::find($id);
//        $laptops = Product::where('product_id', '!=', $id)->take(5)->get();
//        return view('Product_files.product', ['product' => $product, 'laptops' => $laptops]);
//    }
//

    public function basket()
    {
        if (Auth::check()) {
            return view('checkout.basket');
        } else {
            return redirect()->route('login');
        }
    }

    public function addToBasket($id)
    {
        $product = Product::findOrFail($id);

        $basket = session()->get('basket', []);

        if (isset($basket[$id])) {
            $basket[$id]['quantity']++;

        } else {
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

    public function updateBasket(Request $request)
    {
        if ($request->id && $request->quantity) {
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

    public function removeFromBasket(Request $request)
    {
        if ($request->id) {
            $basket = session()->get('basket');
            if (isset($basket[$request->id])) {
                unset($basket[$request->id]);
                session()->put('basket', $basket);
            }
            session()->flash('success', 'The item has been removed!');
        }

    }

//@BilalMo code for the search bar (not completed yet)
    public function search(Request $request)
    {
        $data = $request->input('search');
        $category = 'all';
        $query = DB::table('products')->where('stock', '>', 0);
        if(!empty($data)){
            $query = $query->where('brand', 'LIKE',"%$data%")
                ->orWhere('price', 'LIKE',"%$data%");
        }
        //Here i want to link it with the page that says (no products available , but for now
       // ill use this (doesnt even show up anyway)
        $products = $query->paginate(12);

//            DB::table('products')->where('brand', 'LIKE', "% {$data} %")
//            ->orWhere('price','LIKE', "% {$data} %")->paginate(12);
        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
     //dd($products);
        return view('Product_files.productL', compact('products','category','brands'));

//        $search = request()->input('search');
//        $category = 'all';
//        $products= Product::where('brand', 'LIKE', "% . $search . %")
//       ->paginate(12);
//        $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
//        return view('Product_files.products', compact('products','category','brands'));
    }

    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product', compact('product'));
}
}



    // @say3dd (Mohammed Miah) Function to show a maximum of 4 products on the home page, namely the "Our Laptops" section./


    // @say3dd (Mohammed Miah) Function to allow us to see related products on the individual product details page




