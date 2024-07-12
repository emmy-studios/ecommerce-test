<?php

namespace App\Livewire\Subscribe;

use App\Mail\SubscribeNewsMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SubscribeFormEmail extends Component
{

    public $email;

    protected $rules = [
        'email' => 'required|email'
    ];

    public function subscribe()
    {
        $this->validate();

        Mail::to($this->email)->send(new SubscribeNewsMail($this->email));

        session()->flash('message', 'Subscription successful!');
    }

    public function render()
    {
        return view('livewire.subscribe.subscribe-form-email');
    }
}
