<?php
//@noramknarf (Francis Moran) - Everything barring tweaks from others (As mentioned in the comment in contents())
namespace App\Http\Controllers\Basket;

use App\Http\Controllers\Controller;
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

        $running_total = 0.00;
        foreach($userBasket as $item){
            $running_total += $item->product_price;
        }
        return view('FrontEnd.cart', ['userID' => $userID, 'userBasket' => $userBasket, 'total' => $running_total]);
    }

    public function removeItem(){
        $basketID = request()->basketToDelete;
        $userID = Auth::id();

        if($basketID != '' && $userID != null){
            $delSuccessful = DB::table('baskets')->where('id',$basketID)->delete();
        }

        return $this->contents();
    }

}
