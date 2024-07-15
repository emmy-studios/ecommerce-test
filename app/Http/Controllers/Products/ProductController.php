<?php

namespace App\Http\Controllers\Products;

use Illuminate\Support\Facades\DB;

use App\Models\Products\Product;

use App\Http\Controllers\Controller;
use App\Models\Discounts\Discount;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->get();

        $products = Product::with('productImages')->get();

        return view('pages.products-list', compact('categories', 'products'));
    }

    public function show($id)
    {
        $product = Product::with(['productImages', 'productDetails.color', 'productDetails.size'])->findOrFail($id);

        $uniqueColors = $product->productDetails->whereNotNull('color')->unique('color.product_color')->values();

        return view('pages.product-detail', compact('product', 'uniqueColors'));
    }
} 
 