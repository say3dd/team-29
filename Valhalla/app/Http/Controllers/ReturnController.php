<?php

// Author @BM786 = Basit Ali Mohammad 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function showReturnForm()
    {
        return view('return');
    }
}