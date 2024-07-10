<?php

namespace App\Livewire\Shoppingcarts;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;

class ShoppingcartDropdown extends Component
{

    public $shoppingcartProducts;
    public $totalProducts = 0;
    public $totalPrice = 0;
 
    public function mount()
    {
        $user = Auth::user();

        if ($user && $user->shoppingcart){
            $this->shoppingcartProducts = $user->shoppingcart->products()->with('firstImage')->get();
        } else {
            $this->shoppingcartProducts = collect();
        }
        $this->calculateTotals();
    }

    public function removeProduct($productId)
    {
        $shoppingcart = Auth::user()->shoppingcart;
        $shoppingcart->products()->detach($productId);
        $this->shoppingcartProducts = $shoppingcart->products()->with('firstImage')->get();
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->totalProducts = $this->shoppingcartProducts->count();
        $this->totalPrice = $this->shoppingcartProducts->sum('unit_price');
    }

    public function render()
    {
        return view('livewire.shoppingcarts.shoppingcart-dropdown', 
        [
            'shoppingcartProducts' => $this->shoppingcartProducts,
            'totalProducts' => $this->totalProducts,
            'totalPrice' => $this->totalPrice,
        ]);
    }
}
 