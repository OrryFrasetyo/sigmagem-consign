<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'no_hp',
        'email_verified_at',
        'password',
        'foto_profile',
        'kota',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);  // Seorang Customer dapat memiliki banyak Produk
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);  // Seorang Customer dapat memiliki banyak Cart
    }

    protected static function booted()
    {
        static::saving(function ($customer) {
            $customer->email_verified_at = $customer->email_verified_at ?? now();
            $customer->remember_token = $customer->remember_token ?? Str::random(60);
        });
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

    public function alamats()
    {
        return $this->hasMany(Alamat::class);
    }
}
