<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks'; // Pastikan nama tabel benar
    protected $fillable = [
        //relasi nama customer
        'nama_produk',
        'category_id',
        'harga',
        'fee_penjualan',
        'dana_diterima',
        'berat',
        'stok',
        'dimensi_barang',
        'packing_kayu',
        'asuransi',
        'gambar',
        'kondisi_barang',
        'garansi',
        'lama_pemakaian',
        'tangan_ke',
        'waktu_pembelian',
        'minus',
        'kelengkapan',
        'wireless',
        'suara_aman'
    ]; // Kolom yang bisa diisi

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
