<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Mail\ContactusMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CoreController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }
    
    public function aboutUs()
    {
        return view('pages.about-us');
    }

    public function contactPost(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('fernandoarroliga@hotmail.com')->send(new ContactusMail($request->all()));

        // Success Send Flash Message
        session()->flash('successEmail', 'The message was send successfully!');

        return redirect()->route('about.us');
    }

    public function brands()
    {
        return view('pages.brands');
    }

}
