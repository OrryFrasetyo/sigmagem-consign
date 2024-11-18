<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Pastikan nama tabel benar
    protected $fillable = [
        'nama_produk',
        'category_id',
        'harga',
        'fee_penjualan',
        'dana_diterima',
        'berat',
        'stok',
        'dimensi_barang',
        'gambar',
        'kondisi_barang',
        'garansi',
        'deskripsi_produk',
    ]; // Kolom yang bisa diisi

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
