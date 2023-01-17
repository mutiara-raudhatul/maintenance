<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_kebutuhan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "detail_kebutuhan"; //cek
    protected $primaryKey = "id_detail_kebutuhan"; //cek

    protected $fillable = [
        'id_detail_kebutuhan', 'id_permintaan_barang', 'jumlah_permintaan', 'id_jenis_barang'    
    ];
}
