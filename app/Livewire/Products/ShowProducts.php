<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Products\Product;

class ShowProducts extends Component
{

    public $products;

    protected $listeners = ['reloadPosts'];

    public function mount()
    {
        $this->products = Product::with('categories')->get();
    }

    public function render()
    {
        return view('livewire.products.show-products');
    }

    public function reloadPosts($category_id)
    {
        $this->products = Product::with('categories')
            ->when($category_id, function ($query) use ($category_id) {
                $query->whereHas('categories', function ($query) use ($category_id) {
                    $query->where('categories.id', $category_id);
                });
            })
            ->get();
    }
   
} 
