<?php

namespace App\Livewire\Wishlists;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\Wishlists\Wishlist;

class WishlistDropdown extends Component
{

    public $wishlistProducts;
    public $totalProducts = 0;

    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->wishlist){
            $this->wishlistProducts = $user->wishlist->products()->with('firstImage')->get();
        } else {
            $this->wishlistProducts = collect();
        }
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->totalProducts = $this->wishlistProducts->count();
    }

    public function removeProduct($productId)
    {
        $wishlist = Auth::user()->wishlist;
        $wishlist->products()->detach($productId);
        $this->wishlistProducts = $wishlist->products()->with('firstImage')->get();
        $this->calculateTotals();
    }

    public function render()
    {
        return view('livewire.wishlists.wishlist-dropdown', 
        [
            'wishlistProducts' => $this->wishlistProducts,
            'totalProducts' => $this->totalProducts,
        ]);
    }
}
