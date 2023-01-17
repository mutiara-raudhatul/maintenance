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
        'id_permintaan_maintenance', 'id_serial_number', 'tanggal_permintaan', 'keterangan_maintenance', 'id_status_maintenance'    
    ];

    public function status_maintenance (){
        return $this->belongsTo(Status_maintenance::class);
    }
}
