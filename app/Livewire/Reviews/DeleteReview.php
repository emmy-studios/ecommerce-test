<?php

namespace App\Livewire\Reviews;

use App\Models\Reviews\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteReview extends Component
{

    public $reviewId;

    public function mount($reviewId)
    {
        $this->reviewId = $reviewId;
    }

    public function deleteReview()
    {
         
        // Search Review
        $review = Review::find($this->reviewId);

        if ($review && $review->user_id == Auth::id()) {
            $review->delete();
            
            // Emit Event
            $this->dispatch('review-deleted', reviewId: $this->reviewId);
        }
        
    }

    public function render()
    {
        return view('livewire.reviews.delete-review');
    }
}
