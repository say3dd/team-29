<?php
//@noramknarf (Francis Moran) - rigged up the logic in showSummary & got the redirect working in placeOrder

/*
Author @BM786 Basit Ali Mohammad == worked on this page.

*/

namespace App\Http\Controllers\Basket;

use App\Models\Orders;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function showSummary()
    {
        $userID = Auth::id();
        $userBasket = session()->get('basket', []);
        // Return the summary view with the user's basket
        return view('checkout.summary')->with('userBasket', $userBasket);
    }
    public function placeOrder(Request $request)
    {
    // Retrieve the basket from the session
    $basket = session()->get('basket', []);

    // Loop through each item in the basket
    foreach ($basket as $id => $details) {
        // Create a new order for each item
        Orders::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'product_name' => $details['product_name'],
            'status' => 'order placed',
            'quantity' => $details['quantity'],
            'price' => $details['price'],
            'tracking_number' => (string) Str::random(10)
        ]);
    }

    // Clear the basket
    session()->forget('basket');
    


        // Redirect to a thank you page or order confirmation page

        /*For now, since we've been told we only need a dummy page and this could take a long time to implement,
        I am going to just redirect to a static image -F */
        return redirect()->route('thank-you')->with('success', 'Thank you for your order!');
    }
}
