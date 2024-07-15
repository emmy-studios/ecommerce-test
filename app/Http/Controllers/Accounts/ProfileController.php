<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Customers\Socialmedialink;
use App\Models\Customers\Address;
use App\Models\Orders\Order;
use App\Models\Reviews\Review;

class ProfileController extends Controller
{
    public function dashboard()
    {   
        $user = auth()->user();
        $address = $user->address;
        $socialmediaurls = $user->socialmedialink;
        $wishlist = $user->wishlist;
        $orders = $user->orders()->paginate(8);    
        $reviews = Review::where('user_id', '=', $user->id)->get();    

        return view('accounts.profile.dashboard', compact('user', 'wishlist', 'address', 'orders', 'socialmediaurls', 'reviews'));
    }
   
    public function profileForm()
    {
        // Get User Information
        $user = Auth::user();
        $socialmedialinks = $user->socialmedialink;
        $addressInfo = $user->address;
 
        return view('accounts.profile.profile-form', compact('user', 'socialmedialinks', 'addressInfo'));
    }

    public function profileUpdate(Request $request)
    {
        // Get User
        $user = Auth::user();

        // Validate Data
        $request->validate([
            'name' => 'string|min:6|max:255',
            'first_name' => 'string|min:3|max:255',
            'last_name' => 'string|min:3|max:255',
            'email' => 'email|unique:users,email,' . $user->id,
            'birth' => 'nullable|date',
            'profile_image' => 'nullable|mimes:png,jpg,jpeg',
            'phone_code' => 'string',
            'phone_number' => 'string',
            'bio' => 'string',
            'country' => 'string|min:7',
            'facebook_url' => 'string',
            'instagram_url' => 'string',
            'twitter_url' => 'string',
            'tiktok_url' => 'string',
        ]);

        // Upload Profile Image
        if($request->has('profile_image')) {
            $file = $request->file('profile_image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;
            $path = 'assets/images/accounts/users/';
            $file->move($path, $filename);

            $user->profile_image = $filename;
        }

        // Update Data
        $user->update($request->only(
            'name', 
            'first_name',
            'last_name',
            'email',
            'birth',
            'phone_code',
            'phone_number',
            'bio',
        ));
        
        if ($user->socialmedialink) {
            $user->socialmedialink()->update($request->only(
                'facebook_url',
                'instagram_url',
                'twitter_url',
                'tiktok_url',
            ));
        }
        
        // Update Address
        if ($user->address) {
            $user->address()->update($request->only(
                'country',
                'state',
                'city',
                'address_line_1',
                'address_line_2',
            ));
        }

        return redirect()->route('dashboard')->with('success', 'Profile Updated Successfully.');
    }
}
 