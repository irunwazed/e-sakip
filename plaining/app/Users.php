<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $table = "users";

    protected $fillable = ['nama','username', 'password', 'akun', 'level', 'status', 'kota_kode', 'opd_kode'];

}
