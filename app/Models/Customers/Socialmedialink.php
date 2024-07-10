<?php

namespace App\Models\Customers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Socialmedialink extends Model
{
    use HasFactory;
    protected $fillable = [
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'whatsapp_url',
        'tiktok_url',
        'user_id',    
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    
}
