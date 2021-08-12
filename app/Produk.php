<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'dosis', 'indikasi', 'efek_samping', 'harga', 'harga_beli', 'satuan', 'stok', 'tmpt_produksi', 
    'kategori_id', 'deskripsi', 'berat', 'gambar'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function getRouteKeyName()
    {
        return 'nama_produk';
    }

    public function pesanan_detail()
    {
        return $this->hasMany('App\PesananDetail', 'produk_id', 'id');
    }

}
