<?php

// Author @BM786 = Basit Ali Mohammad 

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Assuming you have a User model

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch data for the dashboard, such as user information, statistics, etc.
        $userCount = User::count(); // Example: Count of users in the system

        // You can add more data retrieval logic here as needed

        // Pass the data to the view
        return view('dashboard', [
            'userCount' => $userCount,
            // Add more data here if needed
        ]);
    }

    public function orderHistory(){
        
        $user = auth()->user();
        $user->load('orders');

        


        return view('dashboard', ['order_history' => $order_history]);
    }
}
