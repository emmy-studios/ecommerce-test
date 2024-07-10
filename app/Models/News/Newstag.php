<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\News\News;

class Newstag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'news_newstag');
    }
}
