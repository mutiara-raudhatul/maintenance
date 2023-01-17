<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_maintenance extends Model
{
    use HasFactory;

    protected $table = "status_maintenance"; //cek
    protected $primaryKey = "id_status_maintenance"; //cek

    protected $fillable = [
        'id_status_maintenance', 'status_maintenance'    
    ];

    public $timestamps = false;
}
