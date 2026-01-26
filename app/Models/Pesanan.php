<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    
    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'nama_customer',
        'kue_pilihan',
        'jumlah',
        'alamat',
        'no_hp',
    ];

    public $timestamps = false;
}