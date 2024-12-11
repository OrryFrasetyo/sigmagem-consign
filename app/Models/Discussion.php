<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = ['product_id', 'customer_id', 'message'];

    // Relasi ke model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

