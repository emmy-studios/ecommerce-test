<?php

namespace App\Models\Products;

use App\Models\Products\Size;
use App\Models\Products\Color;
use App\Models\Products\Product;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'size_id',
        'color_id',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    
    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
    
    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }
}
