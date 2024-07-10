<?php

namespace App\Livewire\Dropdowns;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Brands\Brand;

class BrandsDropdowns extends Component
{
    use WithPagination;
    //public $brands = [];

    public function mount()
    {
        $this->brands = Brand::paginate(6);
    }

    public function render()
    {
        return view('livewire.dropdowns.brands-dropdowns', 
        [
            'brands' => $this->brands
        ]);
    }
}
