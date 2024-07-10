<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Categories\Category;

class FilterProducts extends Component
{

    public $category_id;

    public function render()
    {
        $categories = Category::get();

        return view('livewire.products.filter-products', ['categories' => $categories]);
    }
    
    public function filter()
    {
        $this->dispatch('reloadPosts', $this->category_id);
    }
}
