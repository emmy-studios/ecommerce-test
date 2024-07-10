<?php

namespace App\Livewire\Products;

use Livewire\Component;

use App\Models\Brands\Brand;

class FilterBrands extends Component
{

    public $brand_id;

    public function render()
    {
        $brands = Brand::get();

        return view('livewire.products.filter-brands', ['brands' => $brands]);
    } 
    
    public function filterBrands()
    {
        $this->dispatch('filterByBrand', $this->brand_id);
    }
}
