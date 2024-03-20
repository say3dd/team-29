<?php

// Author @BM786 = Basit Ali Mohammad

namespace App\Http\Controllers\Product;

use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackingController extends Controller
{
 // Track the order of a product, get its image to ofrom the product table.
    public function trackOrder($id)
    {
        $product = Orders::find($id);
        $product_image = Product::find($product->product_id);

    
        return view('tracking', ['product' => $product, 'product_image' => $product_image]);
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
