<?php

namespace App\Livewire\Core;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

class NavigationLogo extends Component
{

    public $navigationLogo;

    public function render()
    {

        $this->navigationLogo = Websiteinfo::first();

        return view('livewire.core.navigation-logo', ['navigationLogo' => $this->navigationLogo]);
    }
}
