<?php

namespace App\Livewire\Wishlists;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlists\Wishlist;

class AddToWishlistBtn extends Component
{
    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addProductToWishlist()
    {
        $user = Auth::user();
        if (!$user) {
            return;
        }

        $wishlist = Wishlist::firstOrCreate(
            ['user_id' => $user->id]
        );

        if ($wishlist->products()->where('product_id', $this->productId)->doesntExist()) {
            $wishlist->products()->attach($this->productId);
            session()->flash('message', 'Product added to wishlist.');
        } else {
            session()->flash('message', 'Product is already in your wishlist.');
        }
    }

    public function render()
    {
        return view('livewire.wishlists.add-to-wishlist-btn');
    }
}
 