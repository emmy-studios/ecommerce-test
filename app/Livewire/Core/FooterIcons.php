<?php

namespace App\Livewire\Core;

use App\Models\Core\Websiteinfo;
use Livewire\Component;

class FooterIcons extends Component
{

    public $socialmediaLinks;

    public function render()
    {

        $this->socialmediaLinks = Websiteinfo::first();

        return view('livewire.core.footer-icons', ['socialmediaLinks' => $this->socialmediaLinks]);
    }
}
