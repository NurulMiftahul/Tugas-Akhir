<?php

namespace App\Http\Controllers;
use App\keranjang;
use App\Produk;
use App\PesananDetail;
use App\Pesanan;
use App\User;
use App\Province;
use App\City;
use App\Courier;
use Illuminate\Support\Facades\Http;
use Auth;
use DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id->where('status', '!=',0)->get());

        return view('history.detail', compact('pesanans'));
    }

    public function detail($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        PesananDetail::where('pemesanan_id', $pemesanan->id)->get();

        return view('history.detail', compact('pemesanan', 'pemesanan_details'));
    }
}
