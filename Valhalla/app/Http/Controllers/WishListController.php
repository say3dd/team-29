<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class WishListController extends Controller
{
    public function index()
    {
        $userID = Auth::id();
        $wishlistItems = DB::table('Wishlists')
            ->where('user_id', $userID)
            ->join('products', 'Wishlists.product_id', '=', 'products.product_id')
            ->orderBy('position')
            ->get(['products.product_name', 'products.images', 'Wishlists.product_id']);

        return view('FrontEnd.wishlist', ['wishlistItems' => $wishlistItems]);
    }

    public function add(Request $request)
    {
        $user_id = auth()->id();
        $product_id = $request->input('product_id');

        $position = Wishlists::where('user_id', $user_id)->max('position') + 1;
        $wishlist = Wishlists::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'position' => $position,
        ]);
        return back();
    }
    public function saveOrder(Request $request)
    {
        $order = json_decode($request->input('order'));
    
        foreach ($order as $position => $productId) {
            // Remove the 'product_' prefix from the product ID
            $productId = str_replace('product_', '', $productId);
    
            $wishlistItem = DB::table('wishlists')->where('product_id', $productId)->first();
    
            if (!$wishlistItem) {
                return response()->json(['status' => 'error', 'message' => 'Wishlist item not found for product ID: ' . $productId]);
            }
    
            $position += 1;
            DB::table('wishlists')->where('product_id', $productId)->update(['position' => $position]);
        }
    
        return response()->json(['status' => 'success']);
    }

}
