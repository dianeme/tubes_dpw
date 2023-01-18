<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    use HasFactory;

    protected $table = 'tb_laundry';
    protected $primaryKey = 'id_laundry';
    protected $fillable = ['id_pengguna', 'nama', 'alamat', 'nomorhp', 'jenis', 'berat', 'layanan', 'status', 'harga', 'pembayaran'];
}