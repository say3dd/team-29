<?php

// Author @BM786 = Basit Ali Mohammad

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    public function showReturnForm()
    {
        return view('return');
    }
}
