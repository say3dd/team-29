<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $userID = Auth::id();
        $wishlistItems = DB::table('Wishlists')
            ->where('user_id', $userID)
            ->join('products', 'Wishlists.product_id', '=', 'products.product_id')
            ->get(['products.product_name', 'products.images', 'Wishlists.product_id']);

        return view('FrontEnd.wishlist', ['wishlistItems' => $wishlistItems]);
    }

}
