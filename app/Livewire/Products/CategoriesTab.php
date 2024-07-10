<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Categories\Category;

class CategoriesTab extends Component
{

    public $categories;

    public function mount()
    {
        $this->categories = Category::get();
    }

    public function render()
    {
        return view('livewire.products.categories-tab');
    }
}
