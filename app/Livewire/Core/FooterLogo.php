<?php

namespace App\Livewire\Core;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

class FooterLogo extends Component
{

    public $footerIcon;

    public function render()
    {
        $this->footerIcon = Websiteinfo::first();

        return view('livewire.core.footer-logo', ['footerIcon' => $this->footerIcon]);
    }
}
