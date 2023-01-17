<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon_permintaan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "respon_permintaan"; //cek
    protected $primaryKey = "id_respon_permintaan"; //cek

    protected $fillable = [
        'id_respon_permintaan', 'waktu_pengadaan', 'id_permintaan_barang', 'id_user_teknisi'    
    ];
}
