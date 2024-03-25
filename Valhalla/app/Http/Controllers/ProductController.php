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

    /** @Bilal MO - made the index code as well as all functions revolving to products/product page, this is used to display all products
     *pages.
     */
    public function index(Request $request)
    {
        //first displaying all items
        $category = $request->input('category', 'all');
        $query = Product::where('stock', '>', 0);
        // Get distinct brands found within database
        $brands = $category !== 'all' ? Product::select('brand')->where('category', $category)->distinct()->orderBy('brand')
            ->get() : Product::select('brand')->distinct()->orderBy('brand')->get();

//if the category is all , then separate depending on their category
        if ($category !== 'all') {
            $query->where('category', $category);
        }
        //assigns patters to the category - function found in service provider
        $categoryPatterns = $this->productService->getCategoryPatterns($category);
        $patterns = $category !== 'all' ? $categoryPatterns[$category] : [];
        //this extract the data from product desc so it can be used.
        $productDesc = Product::where('category', $category)->distinct()->get()->pluck('product_description');
        // filter part
        $filters = $this->extractFilters($productDesc, $patterns);

        // Applying the filters
        $query = $this->filterProducts($query,$request, $filters);
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

    /**  @KraeBM  The extractFilter - works to extract the data from within the product description and displaying it in the filter container
     * Done by using patterns and preg_match to match the data*/
    protected function extractFilters($descriptions, $patterns)
    {
        //filter first left as an array, to take this data
        $filters = [];
        //for loop works by -
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
        return $filters;
    }

    /** @KraeBM (Bilal Mohamed) This Assigns operations for the sorting function */
    protected function sortLaptops($query, $sorting)
    {
        return match ($sorting) {
            "Price_LtoH" => $query->orderby('price', 'ASC'),
            "Price_HtoL" => $query->orderby('price', 'DESC'),
            "Newest-Arrival" => $query->orderby('created_at', 'ASC'),
            default => $query,
        };
    }

    /** @KraeBM (Bilal Mohamed)  The function works on displaying the laptop based on certain conditionals whether the filter of the feature has been
     *pressed or not - other part for the flexible filter doesnt work so "//" for now*/
    protected function filterProducts($query,Request $request, $filters)
    {
        /**Assigning operations for if there are no filters chosen or
         * if both filters are chosen - here both selected in the request */
        if ($checkedbrands = $request->input('brands', [])) {
            $query->whereIn('brand', $checkedbrands);
        }
        /**This code works on getting the input from the database into what has been selected in the filter container, if correct - its displayed
        used a for loop for this to iterate throughout all products, so any category chosen will also have their distinct features in filter present **/

        foreach ($filters as $filterName => $filterValues) {
            if ($requestInputValues = $request->input($filterName, [])) {
                // Ensure we're working with an array of values
                if (!is_array($requestInputValues)) {
                    $requestInputValues = [$requestInputValues];
                }
                $query->where(function ($q) use ($filterName, $requestInputValues, $filterValues) {
                    // Its applys only the filters that are relevant based on user input
                    foreach ($requestInputValues as $inputValue) {
                        if (in_array($inputValue, $filterValues)) {
                            $q->orWhere('product_description', 'LIKE',"%$filterName: %$inputValue%");
                        }
                    }
                });
            }
        }
      //Debug: Log the final query - i used it to identify certain potential errors in the code during testing

        Log::debug('Final query built:', [$query->toSql(), $query->getBindings()]);
        return $query;
    }
    public function getInfo(Request $request)
    {
        /* had to restate these and put assign them within view since it returns an Undefined variable $brands/$graphics issue **/
        //  $brands = Product::select('brand')->distinct()-> orderby('brand')-> get();
        $laptopID = request()->input('laptopData'); //grabs specifically the section of the request that holds the laptop's ID
        $laptops = Product::all();

        /** Made by @KraeBM (Bilal Mohamed) - this sets the Scroll position to the position of the user input */
        $scrollPosition = $request->input('scrollPosition');
        /*Sets the restore scroll originally to true, if its true, then page refreshes from the top, if not continues by using
    the saved Scroll positon */
        session(['scrollPosition' => $scrollPosition, 'restoreScroll' => true]);
        return redirect()->back();
    }

    /** @KraeBM (Bilal Mohamed) displays the laptop info - also makes sure the related products change when refreshing - will make it change after 5-10s to make it cooler */
    public function showlaptopinfo($id)
    {
        $productDetails = Product::find($id);
        if (!$productDetails) {
            // Handle the case where the product is not found
            abort(404);
        }
        //this displays the related products and the bottom of the template product page
        $relatedProducts = $this->getRelatedProducts($id, $productDetails->category);
        //displays the product features
        $productDetails->features = $this->productService->extractProductFeatures($productDetails);
        //loops through the related products part to show each ind product data
        foreach ($relatedProducts as $relatedProduct) {
            $relatedProduct->features = $this->productService->extractProductFeatures($relatedProduct);
        }
//this is for the displaying  individual images for each product within the images table and assigning it to the specific id
        $images = DB::table('images')->get()->where('product_id', $id);
        return view('Product_files.Product_page_template.laptopproduct_template',['product' => $productDetails, 'relatedProducts' => $relatedProducts, 'images' => $images]);
    }
/** @KraeBM (Bilal Mohamed)  works on showing the other individual product pages using the id - these are everything but the laptops */
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


    /**@KraeBM (Bilal Mohamed) This implements a randomizer for the related products, showing diff products every time when page is refreshed */
public function getRelatedProducts($currentProductId,$category)
{
    $relatedProducts = Product::where('product_id', '!=', $currentProductId)
                        ->where('category',$category)
    ->where('stock','>',0)
    ->take(12)
    ->get()
    ->random(2);
    return $relatedProducts;
}


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




/**@KraeBM (Bilal Mohamed) code for the search bar - this works by searching through the database using SQL Queries to find those items similar to whats searched */
    public function search(Request $request)
    {
        $data = $request->input('search');
        $category = 'all';
        $brands = Product::select('brand')->distinct()->orderby('brand')->get();
        $query = Product::where('stock', '>', 0);

        //This code implements a search where it can look for specific searches that relate to the product-description, using attributes to find certain searches that match to the data
        // within the attribute e.g. if the user searches the gpu name - it looks for those in the attribute that match that name and relate it to the data
        // , which would be the products with that GPU
        if (!empty($data)) {
            $query->where(function ($q) use ($data) {
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
        //this is to show the individual product features in the product boxes
        foreach ($products as $product) {
            $product->features = $this->productService->extractProductFeatures($product);
        }
        return view('Product_files.products', ['products' => $products, 'category' => $category, 'brands' => $brands]);
    }



    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product', compact('product'));
}
}



    // @say3dd (Mohammed Miah) Function to show a maximum of 4 products on the home page, namely the "Our Laptops" section./


    // @say3dd (Mohammed Miah) Function to allow us to see related products on the individual product details page




