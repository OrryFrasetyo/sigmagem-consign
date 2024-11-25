<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['customer_id', 'product_id', 'quantity'];

    // Relasi ke produk
    public function product()
    {
        return $this->belongsTo(Product::class);  // Satu Cart memiliki satu Produk
    }

    // Relasi ke customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);  // Satu Cart dimiliki oleh satu Customer
    }
}

