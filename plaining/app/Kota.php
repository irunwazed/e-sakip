<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    //
    protected $table = "kota";

    protected $fillable = ['kota_kode','kota_nama'];
}
