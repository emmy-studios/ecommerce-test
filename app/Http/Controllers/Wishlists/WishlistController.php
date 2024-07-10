<?php

namespace App\Http\Controllers\Wishlists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Wishlists\Wishlist;

class WishlistController extends Controller
{
    public function show($id)
    {
        $wishlist = Wishlist::with('products')->findOrFail($id);

        //$wishlist = Wishlist::findOrFail($id);

        // Ensure the authenticated user owns the wishlist
        if (Auth::id() !== $wishlist->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $products = $wishlist->products;

        return view('pages.wishlist', compact('id', 'wishlist', 'products'));
    }
}
 