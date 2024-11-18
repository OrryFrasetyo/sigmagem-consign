<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories'; // Pastikan nama tabel benar
    protected $fillable = ['list_category_id', 'nama_kategori', 'gambar']; // Kolom yang bisa diisi

    public function listCategory()
    {
        return $this->belongsTo(ListCategory::class, 'list_category_id');
    }

    // Relasi ke model Produk
    public function product(): HasMany
    {
        return $this->hasMany(Produk::class, 'category_id'); // pastikan nama foreign key sesuai
    }
}
