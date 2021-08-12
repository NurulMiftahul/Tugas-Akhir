<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    public $fillable = ['user_id', 'provinsi', 'kota', 'kecamatan', 'detail'];
}
