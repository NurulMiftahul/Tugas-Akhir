<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function produk()
    {
        return $this->belongsTo('App\Produk','produk_id', 'id');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\Pesanan','pesanan_id', 'id');
    }

    // protected $table='pesanan_details';
    // protected $primaryKey='id';
    // protected $fillable =[
    //     'id', 'user_id', 'tanggal', 'kode', 'status', 'jumlah_harga',
    // ];
}
