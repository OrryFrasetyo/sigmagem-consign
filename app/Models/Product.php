<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Pastikan nama tabel benar

    protected $fillable = [
        'customer_id',
        'nama_produk',
        'list_category_id',
        'category_id',
        'harga',
        'berat',
        'stok',
        'panjang',
        'lebar',
        'tinggi',
        'packing_kayu',
        'asuransi',
        'sisi_depan',
        'sisi_kanan',
        'sisi_atas',
        'lainnya',
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

    public function listCategory()
    {
        return $this->belongsTo(ListCategory::class, 'list_category_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * Accessor untuk fee_penjualan (12% dari harga).
     *
     *  @return float
     */
    public function getFeePenjualanAttribute()
    {
        return $this->attributes['harga'] * 0.12;
    }

    /**
     * Accessor untuk dana_diterima (harga - fee_penjualan).
     *
     * @return float
     */
    public function getDanaDiterimaAttribute()
    {
        return $this->attributes['harga'] - $this->fee_penjualan;
    }

    /**
     * Mutator untuk menyimpan dimensi_barang sebagai JSON.
     *
     * @param array $value
     */
    public function setDimensiBarangAttribute($value)
    {
        $this->attributes['dimensi_barang'] = json_encode($value);
    }

    /**
     * Accessor untuk mendapatkan dimensi_barang sebagai array.
     *
     * @param string $value
     * @return array
     */
    public function getDimensiBarangAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator untuk menyimpan gambar sebagai JSON.
     *
     * @param array $value
     */
    public function setGambarAttribute($value)
    {
        $this->attributes['gambar'] = json_encode($value);
    }

    /**
     * Accessor untuk mendapatkan gambar sebagai array.
     *
     * @param string $value
     * @return array
     */
    public function getGambarAttribute($value)
    {
        return json_decode($value, true);
    }

}
