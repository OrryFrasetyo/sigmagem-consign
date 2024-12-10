<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamats';

    protected $fillable = [
        'customer_id',
        'nama_penerima',
        'no_telp',
        'provinsi',
        'kota',
        'kecamatan',
        'kode_pos',
        'alamat',
        'detail',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}

