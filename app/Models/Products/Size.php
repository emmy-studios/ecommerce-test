<?php

namespace App\Models\Products;

use App\Models\Products\ProductDetail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Size extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_size',
        'note',
    ];

    public function productDetails(): HasMany
    {
        return $this->hasMany(ProductDetail::class);
    }
}
