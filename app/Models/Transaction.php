<?php

namespace App\Models;

use App\Enums\ProductPayment;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $casts = [
        'status_pembayaran' =>  ProductPayment::class,
        'status_produk' => ProductStatus::class,
    ];

    // Relasi ke tabel customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


    // Relasi ke tabel alamat
    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'alamat_id');
    }

    // Relasi ke tabel produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }



}
