<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "status_barang"; //cek
    protected $primaryKey = "id_status_barang"; //cek

    protected $fillable = [
        'id_status_barang', 'status_barang'    
    ];
}
