<?php

namespace App\Livewire\Reviews;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Reviews\Review;

class ShowReviews extends Component
{
    public $productId;
    public $reviews;
    public $content;

    public function mount($productId)
    {
        $this->productId = $productId;
        $this->reviews = Review::where('product_id', $productId)->get();
    }

    public function addReview()
    {
        $user = Auth::user();
        
        if (!$user) {
            return;
        }

        $this->validate([
            'content' => 'required|string|max:255',
        ]);

        Review::create([
            'user_id' => $user->id,
            'product_id' => $this->productId,
            'content' => $this->content,
        ]);
        // Clear the content
        $this->content = '';

        // Reload reviews
        $this->reviews = Review::where('product_id', $this->productId)->get();

    }

    public function render()
    {

        return view('livewire.reviews.show-reviews');
    }
}
