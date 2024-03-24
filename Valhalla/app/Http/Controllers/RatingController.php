<?php

namespace App\Http\Controllers;

//<!--{{--Authors = Basit Ali Mohammad = @BM786 --}}-->

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{

    public function store(Request $request, $id)
    {

//        $validator = Validator::make($request->all(), [
//            'rating' => 'required|integer|min:1|max:5',
//            'review' => 'required|string',
//            'product_id' => 'required|exists:products,id',
//        ]);
        $t_box = request()->input('text-box');
//        const review = reviewText.value;

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'You must be logged in to rate a product.');
        }

        $review = Auth::user()->ratings()->where('product_id')->first();
        $product_id = Product::findOrFail($id);

//        $review = new Review();
//        $review->rating = $validatedData['rating'];
//        $review->review = $validatedData['review'];
//        $review->user_id = $userId;
//        $review->product_id = $validatedData['product_id'];
//        $review->save();

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
