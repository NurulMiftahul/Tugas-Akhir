<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use DB;
use App\Produk;
use App\Kategori;

class PageController extends Controller
{
    public function home(Request $request)
    {
        $obatall = Produk::get();
        $kategori = Kategori::all();
        // $produk = Produk::latest()->get()->random(4);
        $produk = Produk::all();

        // if ($request->method() == 'POST') {
        //     return json_encode(['data' => $request->getContent()]);
        // }
        
        return view('user.dashboard', compact('obatall', 'kategori', 'produk'));
    }

    public function obat()
    {
        $obat = Produk::get();
        return view('user.Obat', compact('obat'));
    }

    public function show(Produk $produk){
        $produk_detail = $produk;

        return view('user.show', compact('produk_detail'));
    }

    public function produk_kategori (Kategori $kategori)
    {
        $obatall    = $kategori->produk()->get();
        // $kategori = Produk::get();
        return view('user.Obat', compact('obatall', 'kategori'));
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;
        $kategori = Kategori::all();
        $data_produk = DB::table('produk')->where('nama_produk', 'like', "%".$cari."%")->paginate();

        //mengirim data produk ke view index
        return view('user.cari',['produk' => $data_produk, 'kategori' => $kategori]);
    }

    public function klik_kategori ($kategori)
    {
        $produk = Produk::where('kategori_id', $kategori)->get();
        $kategori = Kategori::get();
        
        return view('user.kategori', compact('produk','kategori'));
    }
}
