<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_permintaan_barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "detail_permintaan_barang"; //cek
    protected $primaryKey = "id_permintaan_barang"; //cek
    protected $compoundKey = "kode_jenis"; //cek

    protected $fillable = [
        'id_permintaan_barang', 'kode_jenis', 'id_status_permintaan'    
    ];
}
