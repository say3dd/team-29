<?php
//@noramknarf (Francis Moran) - rigged up the logic in showSummary & got the redirect working in placeOrder

/*
Author @BM786 Basit Ali Mohammad == worked on this page.

*/

namespace App\Http\Controllers\Basket;

use App\Models\Orders;
use App\Models\Product;
use App\Models\BasketItem;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showSummary()
    {
        $userId = Auth::id();
    
        // Get items in user's basket
        $userBasket = BasketItem::where('user_id', $userId)->get();
    
        // Return the summary view with the user's basket
        return view('checkout.summary')->with('userBasket', $userBasket);
    }
    public function placeOrder(Request $request)
    {
        $userId = Auth::id();
    
        $basketItems = BasketItem::where('user_id', $userId)->get();
    
        // Loop through each item in the basket
        foreach ($basketItems as $item) {
            // Create a new order for each item
            Orders::create([
                'user_id' => $userId,
                'product_id' => $item->product_id,
                'product_name' => $item->product_name,
                'status' => 'order placed',
                'quantity' => $item->quantity,
                'price' => $item->price * $item->quantity,  
                'tracking_number' => (string) Str::random(10)
            ]);
    
            // Find the product
            $product = Product::find($item->product_id);
    
            // Decrease the stock level
            $product->stock -= $item->quantity;
    
            // Save the product
            $product->save();
        }
    
        // Clear the user's basket
        BasketItem::where('user_id', $userId)->delete();
    
        // Redirect to a thank you page or order confirmation page
        return redirect()->route('thank-you')->with('success', 'Thank you for your order!');
    }
}
