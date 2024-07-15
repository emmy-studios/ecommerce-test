<?php

namespace App\Http\Controllers\Accounts;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\SignupRequest;
use App\Models\Core\Websiteinfo;

class AuthenticationController extends Controller
{
    public function login()
    {
        $websiteInfo = Websiteinfo::first();

        return view('accounts.authentication.login', ['websiteInfo' => $websiteInfo]);
    }
    public function signup()
    {
        $websiteInfo = Websiteinfo::first();

        return view('accounts.authentication.signup', ['websiteInfo' => $websiteInfo]);
    }
    public function register(SignupRequest $request)
    {
        $formfields = $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => 'default_profile_photo.png', 
            'first_name' => 'Random',
            'last_name' => 'Name',
            'phone_code' => '+506',
            'phone_number' => '123456789',
            'bio' => 'Write some bio text here.',
        ]);

        Auth::login($user);

        // Add Generic User Address
        $user->address()->create([
            'country' => 'Country',
            'state' => 'State',
            'city' => 'City',
            'address_line_1' => 'Add your personal address here.',
            'address_line_2' => 'Add more shipping address here, where you are going to receive the products.',
            'postal_code' => '12345678',
            'user_id' => $user->id,
        ]);
        
        // Add User Socialmedialinks
        $user->socialmedialink()->create([
            'facebook_url' => 'https://www.facebook.com/',
            'instagram_url' => 'https://www.instagram.com/',
            'twitter_url' => 'https://x.com/',
            'tiktok_url' => 'https://www.tiktok.com/explore',
            'user_id' => $user->id,
        ]);

        // Create Shoppingcart
        $user->shoppingcart()->create([
            'user_id' => $user->id,
        ]);

        // Create Wishlist
        $user->wishlist()->create([
            'user_id' => $user->id,
        ]);

        return redirect()->route('home')->with('success', 'Account created successfully!');    
    }
    public function authenticate(LoginRequest $request)
    {

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'errorCredentials' => 'Wrong Credentials. Please, Try Again!',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
