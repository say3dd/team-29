<?php
//@noramknarf (Francis Moran) - rigged up the logic in showSummary & got the redirect working in placeOrder

/*
Author @BM786 Basit Ali Mohammad == worked on this page.

*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function showSummary()
    {
        $userID = Auth::id();
        $baskets = DB::table('baskets')->get();
        $userBasket = $baskets->where('user_id', $userID);

        $running_total = 0.00;
        foreach($userBasket as $item){
            $running_total += $item->product_price;
        }
        //Copied this logic from the basket page, seems to work but may need tweaking later
        $running_total += 5.00; //The 5.00 is the placeholder shipping cost as shown on the basket page
        return view('checkout.summary', ['userBasket' => $userBasket, 'total' => $running_total]);
    }

    public function placeOrder(Request $request)
    {
        // Add logic to process the order and store it in the database
        // You can access form input data using $request->input('your_input_name')
        // For example: $productName = $request->input('product_name');

        // Your order processing logic here

        // Redirect to a thank you page or order confirmation page

        /*For now, since we've been told we only need a dummy page and this could take a long time to implement,
        I am going to just redirect to a static image -F */
        return redirect()->route('thank-you')->with('success', 'Thank you for your order!');
    }
}
