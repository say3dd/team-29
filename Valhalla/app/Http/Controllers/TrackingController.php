<?php

// Author @BM786 = Basit Ali Mohammad 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackingController extends Controller
{
    
    public function tracking(Request $request)
    {
       
        $trackingId = $request->input('tracking_id');


        $trackingInfo = $this->getTrackingInfo($trackingId);

    
        return view('tracking', ['trackingInfo' => $trackingInfo]);
    }


    private function getTrackingInfo($trackingId)
    {

        return [
            'tracking_number' => $trackingId,
            'status' => 'In Transit',
            'estimated_delivery' => 'February 28, 2024',

        ];
    }
}