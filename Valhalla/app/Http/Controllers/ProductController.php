<?php
//@noramknarf (Francis Moran) - getInfo() function, redirect to login in basket(), image handling in showlaptopinfo
/* @KraeBM (Bilal Mohamed) worked on this page (pageupdate function) */
namespace App\Http\Controllers;

use App\Http\Controllers\BasketService\BasketInterface;
use App\Http\Requests\BasketRequest;
use App\Models\BasketItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\ProductService;


class ProductController extends Controller implements BasketInterface
{
    //Used ProductService as a service that both homecontroller and productController can use to extract
    //data into the product side of the home page since duplicating code will mess code up.
    protected $productService;

    public function __construct(ProductService $productService)
    {
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
        // Get distinct brands found within database
        $brands = $category !== 'all' ? Product::select('brand')->where('category', $category)->distinct()->orderBy('brand')
            ->get() : Product::select('brand')->distinct()->orderBy('brand')->get();


        if ($category !== 'all') {
            $query->where('category', $category);
        }
        $categoryPatterns = $this->productService->getCategoryPatterns($category);
        $patterns = $category !== 'all' ? $categoryPatterns[$category] : [];
        $productDesc = Product::where('category', $category)->distinct()->get()->pluck('product_description');
        // filter part
        $filters = $this->extractFilters($productDesc, $patterns);
        // Applying the filters
        $query = $this->filterProducts($query,$request, $filters);
       // dd($query->toSql(), $query->getBindings()); // This will show you the SQL and the bindings

        // Applying sorting
        $this->sortLaptops($query, $request->input('sorting'));
        // this paginates the page to 12 products
        $products = $query->paginate(12);
        //this loops the feature extraction function to display the features to all products
        foreach ($products as $product) {
            $product->features = $this->productService->extractProductFeatures($product);
        }

        // Pass everything to be shown to the view
        return view('Product_files.products', ['products' => $products, 'brands' => $brands, 'filters' => $filters, 'category' => $category]);
    }

    /**  @Bilal Mo extract filter was for the filtering part - kinda not needed rn since it doesnt work :/ */
    protected function extractFilters($descriptions, $patterns)
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
       // Log::debug('Patterns used:', $patterns);
      //  Log::debug('Filters extracted:', $filters);
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
    protected function filterProducts($query,Request $request, $filters)
    {
        /**Assigning operations for if there are no filters chosen or
         * if both filters are chosen - here both selected in the request */
        // \Log::debug('Query before filters:', [$query->toSql(), $query->getBindings()]);

        if ($checkedbrands = $request->input('brands', [])) {
            $query->whereIn('brand', $checkedbrands);
        }

        foreach ($filters as $filterName => $filterValues) {
            if ($requestInputValues = $request->input($filterName, [])) {
                // Ensure we're working with an array of values
                if (!is_array($requestInputValues)) {
                    $requestInputValues = [$requestInputValues];
                }
                $query->where(function ($q) use ($filterName, $requestInputValues, $filterValues) {
                    // Apply only the filters that are relevant based on user input
                    foreach ($requestInputValues as $inputValue) {
                        if (in_array($inputValue, $filterValues)) {
                            $q->orWhere('product_description', 'LIKE',"%$filterName: %$inputValue%");
                        }
                    }
                });
            }
        }


//        if ($request->has('GPU') && array_key_exists('GPU', $filters)) {
//            $query->where(function ($q) use ($filters) {
//                foreach ($filters['GPU'] as $value) {
//                    $q->orWhereRaw('UPPER(product_description) LIKE UPPER(?)', ["%GPU:%{$value}%"]);
//                }
//            });
//        }

//        $query->where(function ($query) use ($filters) {
//            foreach ($filters as $attribute => $values) {
//                $query->orWhere(function ($query) use ($attribute, $values) {
//                    foreach ($values as $value) {
//                        // Debug: Log the query
//                        Log::debug("Applying filter: {$attribute} LIKE {$value}");
//                        $query->orWhere('product_description', 'LIKE', "%{$value}%");
//                    }
//                });
//            }
//        });

        // Debug: Log the final query
        Log::debug('Final query built:', [$query->toSql(), $query->getBindings()]);

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
        return view('Product_files.Product_page_template.laptopproduct_template',['product' => $productDetails, 'relatedProducts' => $relatedProducts, 'images' => $images]);
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
        return view('Product_files.Product_page_template.otherproduct_template',['product' => $productDetails, 'relatedProducts' => $relatedProducts]);
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

        // Check for existing basket item in the database
        $basketItem = Auth::user()->basketItems()->where('product_id', $id)->first();

        if ($basketItem) {
            // Update quantity if item already exists
            $basketItem->quantity++;
            $basketItem->updateOrFail();
        } else {
            // Create a new BasketItem model instance
            $basketItem = new BasketItem;
            $basketItem->user_id = Auth::id();
            $basketItem->product_id = $id;
            $basketItem->product_name = $product->product_name;
            $basketItem->product_images = $product->images;
            $basketItem->quantity = 1;
            $basketItem->price = $product->price;
        }
        $basketItem->save();

        return redirect()->back()->with('success', 'Item has been added to basket');
    }





    public function updateBasket(Request $request, $id)
    {
        $basketItem = BasketItem::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Update the basket item
        $basketItem->update($validatedData);

        // Recalculate the total price
//        $basketItem->price = $basketItem->product->price * $basketItem->quantity;
//        $basketItem->save();

        // Redirect or return a response as per your requirements
        return redirect()->back()->with('success', 'Basket item updated successfully.');
    }

    public function removeBasket($id)
    {
        $basketItem = BasketItem::findOrFail($id);
        $basketItem->delete();

        return redirect()->back()->with('success', 'Basket item removed successfully.');
    }




//@BilalMo code for the search bar (not completed yet)
    public function search(Request $request)
    {
        $data = $request->input('search');
        $category = 'all';
        $brands = Product::select('brand')->distinct()->orderby('brand')->get();
        $query = Product::where('stock', '>', 0);

        if(!empty($data)) {
//Trying to implement search where it can look for specific searches, if mouses cool, but if they want a black mouse i want to only show
            //'black  mouses'
            // $indvData = explode(' ',$data);
            $query->where(function ($q) use ($data){
                $q->where('brand', 'LIKE', "%$data%")
                    ->orWhere('product_name', 'LIKE', "%$data%")
                    ->orWhere('product_description', 'LIKE', "%$data%");

                $attributes = ['RAM', 'Processor', 'GPU',
                    'Connectivity', 'Keyboard Type', 'Screen Size',
                    'Refresh rate', 'Response Time', 'Switches', 'Colour', 'Category'];

                foreach ($attributes as $attribute) {
                    $q->orWhere('product_description', 'LIKE', "%{$attribute}: %{$data}%");
                }
            });
        }
        $products = $query->paginate(12);
        foreach ($products as $product) {
            $product->features = $this->productService->extractProductFeatures($product);
        }
        //Here i want to link it with the page that says (no products available , but for now
        // ill use this (doesnt even show up anyway)

//            DB::table('products')->where('brand', 'LIKE', "% {$data} %")
//            ->orWhere('price','LIKE', "% {$data} %")->paginate(12);
        //dd($products);
        return view('Product_files.products',['products' => $products, 'category' => $category,'brands'=>$brands]);

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




