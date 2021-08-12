<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function view($invoice)
    {
        $order = Pesanan::with(['user.district.city.province','payment', 'detail.produk'])->where('invoice', $invoice)->first();
    }
}
