<?php
/*
@AbuIsNotHer3 @BravoBoy2 === The same person (Abubakarsiddik ) worked on this page alone
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{

    /*user will be redirected to either home page or admin page based on the current user.
    If the user has "admin" on the usertype field then they will be redirected admin dashboard page
    and to home page from if they are just "user"
    */
    public function authHome(){
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
                break;
        }

        }
    }

   

    public function index(){
        $laptops = Product::paginate(8);

        return view('FrontEnd.home', ['laptops' => $laptops]);
    }



}
