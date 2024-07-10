<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Categories\Category;

class FilterCategories extends Component
{

    public $category_id; 

    public function render()
    {
        $categories = Category::get();

        return view('livewire.products.filter-categories', ['categories' => $categories]);
    }
    
    public function filterCategories()
    {
        $this->dispatch('filterByCategory', $this->category_id);
    }
}
