<?php

namespace App\Livewire\Dropdowns;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Categories\Category;

class CategoriesDropdown extends Component
{

    use WithPagination;

    //public $categories = [];
    
    public function mount()
    {
        $this->categories = Category::paginate(6);
        
    }

    public function render()
    {
        
        return view('livewire.dropdowns.categories-dropdown', 
        [
            'categories' => $this->categories
        ]);
    }
}
 