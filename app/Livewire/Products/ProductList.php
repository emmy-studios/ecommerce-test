<?php

namespace App\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Products\Product;

class ProductList extends Component
{

    use WithPagination;
    /*
    public function mount()
    {
        $this->products = Product::with('categories')->get();
    }*/

    public $search = '';
    public $category_id = null;
    public $brand_id = null;
    protected $listeners = ['filterByCategory', 'filterByBrand'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function searchProducts()
    {
        $this->resetPage();
    }

    public function filterByCategory($categoryId)
    {
        $this->category_id = $categoryId;
        $this->resetPage();
    }

    public function filterByBrand($brandId)
    {
        $this->brand_id = $brandId;
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::with(['categories', 'brand', 'firstImage'])
            ->where('name', 'like', '%' . $this->search . '%');
        // Filter by category
        if ($this->category_id) {
            $query->whereHas('categories', function($q) {
                $q->where('category_id', $this->category_id);
            });
        } 
        // Filter by brand
        if ($this->brand_id) {
            $query->where('brand_id', $this->brand_id);
        }

        $products = $query->paginate(9);  

        return view('livewire.products.product-list', ['products' => $products]);
    }
} 
 