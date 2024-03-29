<?php

// Author @BM786 = Basit Ali Mohammad
// @say3dd = Mohammed Miah - Did this logic for the return request form

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ReturnRequestSubmitted;
use Illuminate\Support\Facades\Mail;

class ReturnRequestSubmitController extends Controller
{
    public function submit(Request $request)
    {
        // Get the details from the request, remove the token
        $details = $request->except('_token');

        // Send the email
        Mail::to('cs2tpteam29@gmail.com')->send(new ReturnRequestSubmitted($details));
    
        return redirect()->route('dashboard')->with('success', 'Return request submitted successfully!
        You will be contacted soon, thank you for your patience!');
    }
}
