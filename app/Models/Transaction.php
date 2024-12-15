<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    // Kolom yang bisa diisi
    protected $fillable = [
        'customer_id',
        'alamat_id',
        'product_id',
        'bukti_pembayaran',
        'harga_ongkir',
        'total_harga',
        'quantity',
        'status_pembayaran',
        'status_produk',
    ];

    // Relasi ke tabel customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi ke tabel alamat
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    // Relasi ke tabel produk
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
