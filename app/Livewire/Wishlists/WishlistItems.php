<?php

namespace App\Livewire\Wishlists;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlists\Wishlist;

class WishlistItems extends Component
{
    public $wishlist;
    public $totalProducts = 0;

    public function mount($wishlistId)
    {
        $user = Auth::user();
        $this->wishlist = Wishlist::with('products.firstImage')->findOrFail($wishlistId); // Refresh wishlist
        
        if ($user->id !== $this->wishlist->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $this->calculateTotal();

    }

    public function removeProduct($productId)
    {
        $this->wishlist->products()->detach($productId);
        $this->wishlist = Wishlist::with('products.firstImage')->findOrFail($this->wishlist->id); // Refresh wishlist
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalProducts = $this->wishlist->products()->count();
    }

    public function render()
    {
        return view('livewire.wishlists.wishlist-items', 
        [
            'wishlist' => $this->wishlist,
            'totalProducts' => $this->totalProducts,
        ]);
    }
} 
