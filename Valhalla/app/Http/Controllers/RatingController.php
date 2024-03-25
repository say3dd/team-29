<?php

//<!--{{--Authors = Basit Ali Mohammad = @BM786 --}}-->

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Policies\RatingPolicy;

class RatingController extends Controller
{
    public function storeReview(Request $request, Product $product)
    {
        $userId = auth()->user()->id;

        $this->authorize('view', $product->order);

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

            // Return a success response
            return response()->json(['error' => false, 'success' => 'Review submitted successfully']);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to submit review. Please try again.'
            ]);
        }
    }
}


