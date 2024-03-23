<?php

/*
Author @BM786 Basit Ali Mohammad == worked alone on this page.

*/

namespace App\Http\Middleware;

use Closure;
use App\Models\BasketItem;
use Illuminate\Support\Facades\Auth;

class CheckCartNotEmpty
{
    public function handle($request, Closure $next)
    {
        // Add logic to check if the user's cart is not empty
        // If empty, redirect to the cart page or elsewhere
        $userId = Auth::id();

        $count = BasketItem::where('user_id', $userId)->count();

        if ($request->route()->named('thank-you')) {
            return $next($request);
        }
        // If basket is empty, redirect to the basket page with an error
        elseif ($count == 0) {
            return redirect()->route('basket')->with('error', 'No items in basket');
        }
        return $next($request);
    }
}
