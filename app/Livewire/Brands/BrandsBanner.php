<?php

namespace App\Livewire\Brands;

use App\Models\Brands\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandsBanner extends Component
{
    use WithPagination;

    public function render()
    {

        $brands = Brand::paginate(6); 

        return view('livewire.brands.brands-banner', ['brands' => $brands]);
    }
}
