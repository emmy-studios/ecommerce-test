<?php

namespace App\Models\Categories;

use App\Models\Products\Product;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_subcategory');
    }
    
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

}
