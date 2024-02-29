<?php
/*
@AbuIsNotHer3 @BravoBoy2 === The same person (Abubakarsiddik ) worked on this page alone
*/
namespace App\Http\Controllers;

use App\Http\Controllers\BasketService\BasketInterface;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

// use App\Models\User;


class HomeController extends Controller implements BasketInterface
{

//  \\  use Controllers\ProductController;

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

    public function addToBasket($id){}



    public function index(){
        $products = Product::paginate(4);


        return view('FrontEnd.home', ['products' => $products]);
    }




}
