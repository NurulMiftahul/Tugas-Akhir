<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table='member';
    protected $primaryKey='id';
    protected $fillable =[
        'name', 'email', 'alamat','ttl', 'jk', 'no_telp', 'password', 'company', 'address1', 'address2', 'province_id', 'city_id', 'post_code','foto'
    ];
}
