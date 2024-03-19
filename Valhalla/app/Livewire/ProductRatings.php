<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rating;

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

    public function mount($product)
    {
        $this->product = $product; // Initialize $product here

        if (auth()->user() && $this->product) { // Check if $product is not null
            $rating = Rating::where('user_id', auth()->user()->id)
                ->where('product_id', $this->product->id)
                ->first();
            if ($rating) {
                $this->rating = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
    }

    public function render()
    {
        if ($this->product) { // Check if $product is not null before accessing its id
            $comments = Rating::where('product_id', $this->product->id)->with('user')->get();
            return view('livewire.product-ratings', compact('comments'));
        } else {
            return view('livewire.product-ratings'); // Return empty view if $product is null
        }
    }

    public function rate()
    {
        if (auth()->user() && $this->product) { // Check if $product is not null
            $rating = Rating::where('user_id', auth()->user()->id)
                ->where('product_id', $this->product->id)
                ->first();
            $this->validate();
            if ($rating) {
                $rating->user_id = auth()->user()->id;
                $rating->product_id = $this->product->id;
                $rating->rating = $this->rating;
                $rating->comment = $this->comment;
                $rating->update();
                session()->flash('message', 'Success!');
            } else {
                $rating = new Rating;
                $rating->user_id = auth()->user()->id;
                $rating->product_id = $this->product->id;
                $rating->rating = $this->rating;
                $rating->comment = $this->comment;
                $rating->save();
                $this->hideForm = true;
            }
        }
    }
}
