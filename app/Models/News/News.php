<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\News\Author;
use App\Models\News\Newstag;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'resume',
        'header',
        'section_1',
        'section_2',
        'second_image',
        'conclusion',
        'content',
        'header_image',
    ];

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(Author::class, 'author_news');
    }

    public function newstags(): BelongsToMany
    {
        return $this->belongsToMany(Newstag::class, 'news_newstag');
    }

    // Accesor para obtener las primeras 20 palabras del contenido
    public function getExcerptAttribute()
    {
        return $this->limitWords($this->content, 20);
    }

    // Método para limitar el número de palabras
    private function limitWords($string, $wordLimit)
    {
        $words = explode(' ', $string);
        if (count($words) <= $wordLimit) {
            return $string;
        }
        return implode(' ', array_slice($words, 0, $wordLimit)) . '...';
    }
}
