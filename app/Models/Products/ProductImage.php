<?php

namespace App\Models\Products;

use App\Models\Products\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'description',
        'product_id',
    ];
    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
