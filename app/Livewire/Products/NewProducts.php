<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Products\Product;

class NewProducts extends Component
{
    public function render()
    {

        $products = Product::orderBy('created_at', 'desc')->take(3)->get();

        return view('livewire.products.new-products', ['products' => $products]);
    } 
}
