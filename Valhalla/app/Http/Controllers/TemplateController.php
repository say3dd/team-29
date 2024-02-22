<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    //

    public function index() {
        return view('Frontend.home');
    }


    public function test(){
    // Implement the logic for the 'tests' method here
        return view('Frontend.test');
    }
}

