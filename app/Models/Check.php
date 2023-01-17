<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "check"; //cek
    protected $primaryKey = "id_check"; //cek

    protected $fillable = [
        'id_check', 'check', 'kondisi', 'informasi', 'id_jenis_check', 'id_jenis_barang'    
    ];
}
