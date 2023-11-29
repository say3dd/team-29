<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //

    public function index(){
        if(Auth::id()){
        $usertype = Auth::user()->usertype;

        switch($usertype){
            case 'admin':
                return view('Admin.adminDashboard');
                break;

            case 'user':

                return view('FrontEnd.home');
                break;
            default:
            return redirect()->back();
        }

        }
    }


}
