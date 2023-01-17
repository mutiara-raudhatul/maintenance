<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respon_maintenance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "respon_maintenance"; //cek
    protected $primaryKey = "id_respon_maintenance"; //cek

    protected $fillable = [
        'id_respon_maintenance', 'jadwal_perbaikan', 'id_permintaan_maintenance', 'id_user'
    ];
}
