<?php

namespace App\Livewire\Shoppingcarts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;

class ShoppingcartItems extends Component
{

    public $shoppingcart;
    public $subTotal = 0;

    public function mount($shoppingcartId)
    {
        $user = Auth::user();
        $this->shoppingcart = Shoppingcart::with('products.firstImage')->findOrFail($shoppingcartId); // Refresh wishlist
        
        if ($user->id !== $this->shoppingcart->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $this->calculateSubtotal();

    }

    public function removeProduct($productId)
    {
        $this->shoppingcart->products()->detach($productId);
        $this->shoppingcart = Shoppingcart::with('products.firstImage')->findOrFail($this->shoppingcart->id); // Refresh wishlist
        $this->calculateSubtotal();
    }

    public function calculateSubtotal()
    {
        $this->subTotal = $this->shoppingcart->products()->sum('unit_price');
    }

    public function render()
    {
        return view('livewire.shoppingcarts.shoppingcart-items', 
        [
            'shoppingcart' => $this->shoppingcart,
            'subTotal' => $this->subTotal,
        ]);
    }
}
 