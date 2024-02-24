<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function showReturnForm()
    {
        return view('return');
    }
}