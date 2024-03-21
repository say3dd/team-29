<?php

// Author @BM786 = Basit Ali Mohammad

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Orders;

class ReturnController extends Controller
{
    public function showReturnForm()
    {
        $orders = Orders::where('user_id', auth()->id())->get();
    
        return view('return', ['orders' => $orders]);
    }
}
