<?php

namespace App\Http\Controllers\BasketService;

use App\Http\Controllers\Controller;

class BasketItemController extends Controller
{
    //

    public function storeBasket(Request $request)
    {
        // Get basket data from session
        $basketData = $request->session()->get('basket', []);

        // Loop through basket items
        foreach ($basketData as $item) {
            // Create a new BasketItem model
            $basketItem = new BasketItem;
            $basketItem->user_id = Auth::id(); // Get authenticated user ID
            $basketItem->product_id = $item['product_id'];
            $basketItem->product_name = $item['product_name'];
            $basketItem->quantity = $item['quantity'];


            $basketItem->save();
        }

        // Clear the session basket data (optional)
        $request->session()->forget('basket');

        return redirect()->route('profile.basket') // Redirect to profile basket view
        ->with('success', 'Basket items saved successfully!');
    }

}
