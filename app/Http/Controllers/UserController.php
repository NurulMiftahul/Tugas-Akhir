<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    public function obat(){
        return view('user.Obat');
    }

    public function detailproduk(){
        return view('user.detailproduk');
    }

    public function keranjang(){
        return view('user.keranjang');
    }

    public function checkout(){
        return view('user.checkout');
    }

    public function contact()
    {
        return view('user.contact');
    }

    public function index()
    {
        $obat = DB::table('produk')->paginate(10);

        return view('user.dashboard', ['produk' => $obat]);
    }

    
}
