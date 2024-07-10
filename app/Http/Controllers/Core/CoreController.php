<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function contactUs()
    {
        return view('pages.contact-us');
    }
}
