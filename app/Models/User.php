<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'is_active',
        'cart_ids',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
    ];

    protected $append = ['full_name'];

    public function getFullName()
    {
        return $this->last_name . ' ' . $this->first_name;
    }

    public function setFullName($value)
    {

        $names = explode(' ', $value);
        return [
            'first_name' => $names[0] ?? '',
            'last_name' => $names[1] ?? '',
        ];
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function productReview()
    {
        return $this->hasMany(ProductReview::class);
    }
}
