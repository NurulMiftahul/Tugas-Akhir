<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfirmasi extends Model
{
    public $nama_member;
    public $tgl_pesanan;
    public $total_harga;
    public $no_rekening;
    public $jumlah_transfer;
}
