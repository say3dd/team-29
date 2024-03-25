<?php

//<!--{{--Authors = Basit Ali Mohammad = @BM786 --}}-->

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function storeReview(Request $request, Product $product)
    {
        $userId = auth()->user()->id;

        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'error' => $validator->errors()->first()
            ]);
        }

        try {
            $review = Rating::create([
                'user_id' => $userId,
                'product_id' => $product->id,
                'rating' => $request->input('rating'),
                'review' => $request->input('review'),
            ]);

                return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => true,
                'error' => 'Failed to submit review. Please try again.'
            ]);
        }
    }
}



//    public function store(Request $request, $id)
//    {

//        $validator = Validator::make($request->all(), [
//            'rating' => 'required|integer|min:1|max:5',
//            'review' => 'required|string',
//            'product_id' => 'required|exists:products,id',
//        ]);
//        $t_box = request()->input('text-box');
////        const review = reviewText.value;
//
//        if (!Auth::check()) {
//            return redirect()->back()->with('error', 'You must be logged in to rate a product.');
//        }
//
//        $review = Auth::user()->ratings()->where('product_id')->first();
//        $product_id = Product::findOrFail($id);

//        $review = new Review();
//        $review->rating = $validatedData['rating'];
//        $review->review = $validatedData['review'];
//        $review->user_id = $userId;
//        $review->product_id = $validatedData['product_id'];
//        $review->save();

