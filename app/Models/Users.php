<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\Users;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Users extends Authenticatable
{
    use HasFactory;

    protected $table = "users"; //cek
    protected $primaryKey = "nip"; //cek

    protected $fillable = [
        'nip', 'role', 'username', 'name', 'email', 'email_verified_at', 'password', 'unit_kerja', 'eselon', 'nohp'     
    ];

    // protected $guarded=[];
    
}