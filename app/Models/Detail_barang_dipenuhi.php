<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_barang_dipenuhi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "detail_barang_dipenuhi"; //cek
    protected $primaryKey = "id_detail_barang_dipenuhi"; //cek

    protected $fillable = [
        'id_detail_barang_dipenuhi', 'jumlah_dipenuhi', 'id_barang', 'id_respon_permintaan'    
    ];
}
