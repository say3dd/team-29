<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    /*user will be redirected to either home page or admin page based on the current user.
    If the user has "admin" on the usertype field then they will be redirected admin dashboard page
    and to home page from if they are just "user"
    */
    public function index(){
        if(Auth::id()){
        $usertype = Auth::user()->usertype;


        switch($usertype){
            case 'admin':
                return view('Admin.adminDashboard');
                break;

            case 'user':
                return view('dashboard');
                break;

            default:
                return redirect()->back();
        }

        }
    }
    public function home(){
        return view('FrontEnd.master');
    }


}
