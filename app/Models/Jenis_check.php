<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_check extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "jenis_check"; //cek
    protected $primaryKey = "id_jenis_check"; //cek

    protected $fillable = [
        'id_jenis_check', 'jenis_check', 'tipe_check', 'id_jenis_maintenance'    
    ];
}
