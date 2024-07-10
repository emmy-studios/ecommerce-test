<?php

namespace App\Models\Products;

use App\Models\Brands\Brand;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductDetail;
use App\Models\Categories\Category;
use App\Models\Categories\Subcategory;
use App\Models\Reviews\Review;
use App\Models\Wishlists\Wishlist;
use App\Models\Shoppingcarts\Shoppingcart;
use App\Models\Orders\Order;
use App\Models\Discounts\Discount;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'unit_price',
        'stock_quantity',
        'selling_quantity',
        'emergency_quantity',
        'total_quantity',
        'brand_id',
    ];
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }
    
    public function subcategories(): BelongsToMany
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Wishlist::class);
    }

    public function shoppingcarts(): BelongsToMany
    {
        return $this->belongsToMany(Shoppingcart::class);
    }

    // Get First Product Image
    public function firstImage()
    {
        return $this->hasOne(ProductImage::class)->oldestOfMany();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }

    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class);
    }

}
