<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance_teknisi extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "maintenance_teknisi"; //cek
    protected $primaryKey = "id_maintenance_teknisi"; //cek

    protected $fillable = [
        'id_maintenance_teknisi', 'lama_pengerjaan', 'note', 'lokasi', 'id_permintaan_maintenance', 'upload_form_maintenance','id_barang'    
    ];
}
