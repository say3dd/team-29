<?php

// Author @BM786 = Basit Ali Mohammad 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReturnRequestSubmitController extends Controller
{
    public function submit(Request $request)
    {
   
        return redirect()->route('return.request.form')->with('success', 'Return request submitted successfully!');
    }
}