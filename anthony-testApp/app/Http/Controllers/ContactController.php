<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showForm()
    {
        return view('contact.form');
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        return redirect()->route('contact.show')->with('success', 'Your message has been sent successfully!');
    }


    public function contact(){
        return view('FrontEnd.contactUs');
    }
}
