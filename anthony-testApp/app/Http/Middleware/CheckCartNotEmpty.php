<?php

namespace App\Http\Middleware;

use Closure;

class CheckCartNotEmpty
{
    public function handle($request, Closure $next)
    {
        // Add logic to check if the user's cart is not empty
        // If empty, redirect to the cart page or elsewhere
        $user = $request->user();

        if ($user && $user->cart && $user->cart->items()->count() === 0) {
            // Redirect to the cart page or elsewhere
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }
        return $next($request);
    }
}
