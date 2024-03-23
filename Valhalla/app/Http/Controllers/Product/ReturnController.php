<?php

// Author @BM786 = Basit Ali Mohammad
// @say3dd = Mohammed Miah - Did this logic for the return request form

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
