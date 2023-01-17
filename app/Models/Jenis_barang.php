<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_barang extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "jenis_barang"; //cek
    protected $primaryKey = "kode_jenis"; //cek

    protected $fillable = [
        'kode_jenis', 'nama', 'template_form_maintenance', 'id_jenis_maintenance'
    ];
    
    public function jenis_maintenance (){
        return $this->belongsTo(Jenis_maintenance::class, 'id_jenis_maintenance', 'id_jenis_maintenance');
    }

    public function model_barang()
    {
        return $this->hashMany(Model_barang::class, 'id_model_barang', 'id_model_barang');
    }
}
