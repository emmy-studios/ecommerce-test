<?php

namespace App\Livewire\Discounts;

use Livewire\Component;
use App\Models\Discounts\Discount as DiscountModel;

class Discount extends Component
{

    public $lastDiscount;

    public function mount()
    {
        $this->lastDiscount = DiscountModel::latest()->first();
    }

    public function render()
    {
        return view('livewire.discounts.discount');
    }
}
