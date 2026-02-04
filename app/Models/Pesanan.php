<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'nama_customer',
        'kue_pilihan',
        'ukuran',
        'harga',
        'jumlah',
        'total',
        'alamat',
        'no_hp',
    ];

    public $timestamps = false;
}