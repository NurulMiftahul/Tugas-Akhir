<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_transaksi', 'id_produk', 'tanggal', 'jumlah_harga', 'keterangan'];
}
