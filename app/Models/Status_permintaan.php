<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_permintaan extends Model
{
    use HasFactory;

    protected $table = "status_permintaan"; //cek
    protected $primaryKey = "id_status_permintaan"; //cek

    protected $fillable = [
        'id_status_permintaan', 'status_permintaan'   
    ];

    public $timestamps = false;
}
