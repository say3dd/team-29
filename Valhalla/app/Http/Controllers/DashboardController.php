<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
