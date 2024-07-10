<?php

namespace App\Livewire\Dropdowns;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class ProfileDropdown extends Component
{
    public function render()
    {

        $user = Auth::user();

        return view('livewire.dropdowns.profile-dropdown', ['user' => $user]);
    }
}
