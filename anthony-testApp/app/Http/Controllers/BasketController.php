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
        return view('FrontEnd/basket', ['userID' => $userID, 'userBasket' => $userBasket]);
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
