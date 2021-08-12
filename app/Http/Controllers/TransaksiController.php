<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\User;
use App\Province;
use App\City;
use App\Courier;
use Illuminate\Support\Facades\Http;
// use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemorder = Keranjang::whereHas('cart', function($q) use ($itemuser){
            $q->where('status_cart', 'checkout');
            $q->where('user_id', $itemuser->id);
        });
        $data = array('title' => 'Data Transaksi',
                'itemorder' => $itemorder,
                'itemuser'  => $itemuser);
        return view('transaksi.index', $data);
        
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $user_id                    = Auth::user()->id;
            $user_email                 = Auth::user()->email;
            $data                       = $request->all();
            $peanan                     = new Pesanan;
            $pesanan->user_id           = $user_id;
            $pesanan->biaya_ongkir      = $biaya_ongkir;
            $pesanan->total_bayar       = $data['total_bayar'];
            $pesanan->metode_pembayaran = $data['metode_pembayaran'];
            $pesanan->status            = 'Baru';
            $pesanan->kode              = mt_rand(100, 999);
            $pesanan->save();  
        }
    }
}
