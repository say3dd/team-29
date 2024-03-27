<?php

//<!--{{--Authors = Basit Ali Mohammad = @BM786 = ratingController --}}-->

//namespace App\Http\Controllers;
//
//use App\Models\Product;
//use App\Models\Rating;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use App\Policies\RatingPolicy;
//
//class RatingController extends Controller
//{
//    public function storeReview(Request $request, Product $product, $id)
//    {
//        $product_id = Product::findOrFail($id);
//
//        $userId = auth()->user()->id;
//
//        $this->authorize('view', $product_id->order);
//
//        $validator = Validator::make($request->all(), [
//            'rating' => 'required|integer|between:1,5',
//            'review' => 'required|string',
//            'product_id' => 'required|integer|exists:products,id',
//        ]);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'success' => false,
//                'error' => $validator->errors()->first()
//            ]);
//        }
//
//        try {
//            $review = Rating::create([
//                'user_id' => $userId,
//                'product_id' => $product_id,
//                'rating' => $request->input('rating'),
//                'review' => $request->input('review'),
//            ]);
//
////             Return a success response
//            return response()->json([
//                'error' => false,
//                'success' => 'Review submitted successfully'
//            ]);
//        } catch (\Exception $e) {
//            return response()->json([
//                'success' => false,
//                'error' => 'Failed to submit review. Please try again.'
//            ]);
////            return redirect()->back()->with('success', 'Review submitted successfully');
////        }catch(\Exception $e){
////            return redirect()->back()->withException($e)->with('errors', 'Failed to submit review. Please try again.');
////        }
//        }
//    }
//}

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $validatedData = $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        if (Auth::check()) { // Check if user is authenticated
            $rating = new Rating();
            $rating->user_id = Auth::id();
            $rating->product_id = $id;
            $rating->rating = $validatedData['rating'];
            $rating->review = $validatedData['review'];

            $rating->save();
            return redirect()->back()->with('success', 'Thank you for your rating!');
        } else {
            return redirect()->back()->with('error', 'You need to be logged in to submit a rating.');
        }
    }

    public function show(Rating $rating) // Route model binding
    {

        return view('laptopproduct_template',['rating' => $rating]);
    }
}



