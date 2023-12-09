<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BasketController extends Controller
{
    // Below is a possibly hacky solution to grabbing the user id from auth. Not sure if this still needs to be here, may move out of the auth folder

    public function contents(){
        $userID = Auth::id();
        $baskets = DB::table('baskets')->get();
        $userBasket = $baskets->where('user_id', $userID);
        
    }

    public function removeItem(){
        $basketID = request()->basketToDelete;
        $userID = Auth::id();

        if($basketID != '' && $userID != null){
            $delSuccessful = DB::table('baskets')->where('id',$basketID)->delete();
        }
        $baskets = DB::table('baskets')->get();
        $userBasket = $baskets->where('user_id', $userID);
        
        $running_total = 0.00;
        foreach($userBasket as $item){
            $running_total += $item->product_price;
        }
        return view('FrontEnd/cart', ['userID' => $userID, 'userBasket' => $userBasket, 'total' => $running_total]);
    }

}
