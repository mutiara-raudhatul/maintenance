<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_barang extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "jenis_barang"; //cek
    protected $primaryKey = "id_jenis_barang"; //cek

    protected $fillable = [
        'id_jenis_barang', 'jenis_barang', 'kode_barang','template_form_maintenance', 'id_jenis_maintenance'
    ];
    
    // public function Model_barang()
    // {
    //     return $this->hasMany(Model_barang::class);
    // }
}
