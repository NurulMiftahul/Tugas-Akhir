<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table       = 'keranjang';
    protected $fillable    = ['id', 'users_id', 'produk_id', 'harga', 'qty', 'berat'];

}
