<?php

namespace App\Livewire\Shoppingcarts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;

class AddToCartBtn extends Component
{

    public $productId;

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addProductToCart()
    {
        $user = Auth::user();
        if (!$user) {
            return;
        }

        $shoppingcart = Shoppingcart::firstOrCreate(
            ['user_id' => $user->id]
        );

        if ($shoppingcart->products()->where('product_id', $this->productId)->doesntExist()) {
            $shoppingcart->products()->attach($this->productId);
            session()->flash('message', 'Product added to your cart.');
        }
    }

    public function render()
    {
        return view('livewire.shoppingcarts.add-to-cart-btn');
    }
}
