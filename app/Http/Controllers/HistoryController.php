<?php

namespace App\Http\Controllers;

use App\Produk;
use App\User;
use App\Keranjang;
use App\Province;
use App\City;
use App\Courier;
use App\Pesanan;
use App\PesananDetail;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HistoryController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

        return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
       $pesanan = Pesanan::where('id', $id)->first();
       $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
    

        return view('history.detail', compact('pesanan',  'pesanan_details')); 
    }
}
