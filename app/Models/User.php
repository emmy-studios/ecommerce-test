<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\FilamentUser;
use App\Models\Customers\Address;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use App\Models\Customers\Socialmedialink;
use App\Models\Wishlists\Wishlist;
use App\Models\Orders\Order;
use App\Models\Shoppingcarts\Shoppingcart;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
//class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'birth',
        'phone_code',
        'phone_number',
        'bio',
        'profile_image',
        'banner_image',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function socialmedialink(): HasOne 
    {
        return $this->hasOne(Socialmedialink::class);
    }
    public function address(): HasOne 
    {
        return $this->hasOne(Address::class);
    }

    public function wishlist(): HasOne
    {
        return $this->hasOne(Wishlist::class);
    }

    public function shoppingcart(): HasOne
    {
        return $this->hasOne(Shoppingcart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    // Filament To Production
    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@gmail.com') && $this->hasVerifiedEmail();
    }
}
