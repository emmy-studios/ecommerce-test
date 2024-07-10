<?php

namespace App\Http\Controllers\Shoppingcarts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Shoppingcarts\Shoppingcart;

class ShoppingcartController extends Controller
{
    public function show($id)
    {

        $shoppingcart = Shoppingcart::findOrFail($id);
        if (Auth::id() !== $shoppingcart->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('pages.shoppingcart', compact('id'));
    }
}
