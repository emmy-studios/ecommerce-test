<?php

namespace App\Models\Brands;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Products\Product;

class Brand extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'logo_url',
        'image_url',
    ];

    public function products(): HasMany
    {
        $this->hasMany(Product::class);
    }
}
