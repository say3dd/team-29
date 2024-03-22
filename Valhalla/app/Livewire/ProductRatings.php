<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rating;
use App\Models\Product;
use App\Livewire;

class ProductRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $product;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',
    ];

    public function render()
    {
        $comments = Rating::where('product_id', $this->product->id)->with('user')->get();
        return view('livewire.product-ratings', compact('comments'));
    }

    public function mount($product): void
    {
        $this->product = $product;

        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('product_id', $this->product->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
    }

    public function rate()
    {
        $this->validate();

        $rating = Rating::where('user_id', auth()->user()->id)
                        ->where('product_id', $this->product->id)
                        ->first();

        if ($rating) {
            $rating->update([
                'rating' => $this->rating,
                'comment' => $this->comment,
            ]);
        } else {
            Rating::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product->id,
                'rating' => $this->rating,
                'comment' => $this->comment,
            ]);
        }

        $this->reset(['rating', 'comment']);
        $this->emit('ratingCreated', 'Rating and comment have been submitted successfully!');
    }
}
