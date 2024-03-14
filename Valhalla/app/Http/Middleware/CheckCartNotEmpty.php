<?php

/*
Author @BM786 Basit Ali Mohammad == worked alone on this page.

*/

namespace App\Http\Middleware;

use Closure;

class CheckCartNotEmpty
{
    public function handle($request, Closure $next)
    {
        // Add logic to check if the user's cart is not empty
        // If empty, redirect to the cart page or elsewhere
        $user = $request->user();

        if (! session('basket') || count(session('basket')) < 1) {
            // Redirect to the cart page or elsewhere
            print_r('this triggers');
            return redirect()->route('basket')->with('error', 'No items in basket');
        }
        return $next($request);
    }
}
