<?php

namespace App\Models\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Websiteinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'website_name',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'tiktok_url',
        'linkedin_url',
        'phone_code',
        'phone_number',
        'main_mail',
        'main_logo',
        'admin_panel_logo',
        'signup_logo',
        'second_mail',
    ];
}
