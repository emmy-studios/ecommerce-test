<?php

namespace App\Livewire\Discounts;

use App\Models\Discounts\Discount;
use Livewire\Component;

class DiscountProducts extends Component
{
    /*public function render()
    {
        $discounts = Discount::with('products')->get();
        $productsWithDiscount = $discounts->pluck('products')->flatten();

        return view('livewire.discounts.discount-products', 
        [
            'discounts' => $discounts, 'productsWithDiscount' => $productsWithDiscount
        ]);
    }*/

    public $productsWithDiscounts;

    public function mount()
    {
        $discounts = Discount::with('products')->get();
        $this->productsWithDiscounts = [];

        foreach ($discounts as $discount) {
            foreach ($discount->products as $product) {
                $product->discount = $discount;
                $this->productsWithDiscounts[] = $product;
            }
        }
    }

    public function render()
    {
        return view('livewire.discounts.discount-products');
    }

}
