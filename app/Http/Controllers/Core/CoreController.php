<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Mail\ContactusMail;
use App\Models\Brands\Brand;
use App\Models\Core\Websiteinfo;
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

        // Send Email
        $websiteInfo = Websiteinfo::first();
        Mail::to($websiteInfo->main_mail)->send(new ContactusMail($request->all()));

        // Success Send Flash Message
        session()->flash('successEmail', 'The message was send successfully!');

        return redirect()->route('about.us');
    }

    public function brands()
    {

        $brands = Brand::all();

        return view('pages.brands', compact('brands'));
    }

}
