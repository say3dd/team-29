<?php
//@noramknarf (Francis Moran) - Everything barring tweaks from others (As mentioned in the comment in contents())
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    // Below is a possibly hacky solution to grabbing the user id from auth. 

    public function contents(){
        $userID = Auth::id();
        $baskets = DB::table('baskets')->get();
        $userBasket = $baskets->where('user_id', $userID);
        //francis in php instead of '/' notation, we use '.' notation, I have updated this for you.
        return view('FrontEnd.basket', ['userID' => $userID, 'userBasket' => $userBasket]);
    }

    public function removeItem(){
        $basketID = request()->basketToDelete;
        $userID = Auth::id();

        if($basketID != '' && $userID != null){
            $delSuccessful = DB::table('baskets')->where('id',$basketID)->delete();
        }
        $baskets = DB::table('baskets')->get();
        $userBasket = $baskets->where('user_id', $userID);
        return view('FrontEnd/basket', ['userID' => $userID, 'userBasket' => $userBasket, 'del' => $delSuccessful]);
    }

}
