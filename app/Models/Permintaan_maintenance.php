<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan_maintenance extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "permintaan_maintenance"; //cek
    protected $primaryKey = "id_permintaan_maintenance"; //cek

    protected $fillable = [
        'id_permintaan_maintenance', 'tanggal_permintaan', 'keterangan', 'id_jenis_barang', 'id_user', 'id_status_maintenance'    
    ];
}
