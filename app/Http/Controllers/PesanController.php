<?php

namespace App\Http\Controllers;

use App\Produk;
use App\User;
use App\Keranjang;
use App\Province;
use App\Pesanan;
use App\City;
use App\Courier;
use App\PesananDetail;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Auth;
use DB;
use Carbon\Carbon;
use Alert;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class PesanController extends Controller
{
    //DETAIL PRODUK
    public function index($id){
       $produk = Produk::where('id', $id)->first();

       return view('pesan.index', compact('produk'));
    }

    public function addtochart (Request $request, $id)
    {
        
        $produk = Produk::where('id', $id)->first();
        $tanggal = Carbon::now();

        //validasi apakah melebihi stok
        if($request->qty > $produk->stok)
        {
            return redirect('detail/'.$id);
        }
        

        //Cek Validasi (jika pesanan status 0 sudah ada tidak perlu buat pesanan baru)
        $cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        
        if(empty($cek_pesanan)){
            //Simpan Database Pesanan
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            // 0 karena baru masuk keranjang
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(10, 99);
            $pesanan->save();
        }       

        //Database Pesanan Detail
        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        //Cek Pesanan Detail
        $cek_pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_pesanan_detail))
        {
            $pesanan_detail = new PesananDetail;
            $pesanan_detail->produk_id =  $produk->id;
            $pesanan_detail->pesanan_id = $pesanan_baru->id;
            $pesanan_detail->qty = $request->qty;
            $pesanan_detail->jumlah_harga = $produk->harga*$request->qty;
            $pesanan_detail->save();
        }else{
            $pesanan_detail = PesananDetail::where('produk_id', $produk->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $pesanan_detail->qty = $pesanan_detail->qty+$request->qty;
            
            //Harga Sekarang
            $harga_pesanan_detail_baru = $produk->harga*$request->qty;
            $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
            $pesanan_detail->update();
        }

        //Jumlah Total
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga+$produk->harga*$request->qty;
        $pesanan->update();

       alert()->success('Data Berhasil Dimasukan Keranjang', 'Sukses');
        return redirect('/dashboarduser');
    }

    public function keranjang(Request $request)
    {
        $user       = Auth::user()->id;
        $usercart   = DB::table('keranjang')->where(['users_id'=>$user])->join('produk', 'produk.id', '=', 'keranjang.produk_id')->get();


        return view('user.keranjang', ['usercart' => $usercart]);
    }

    public function deletecart ($id=null)
    {
        // DB::table('keranjang')->where('produk_id', $id)->delete();
        $cart = session("cart");
        unset($cart[$id_produk]);
        session(["cart" => $cart]);
        
    }

    public function checkout ()
    {
        $users_id = Auth::user()->id;
        // $usercart = DB::table('keranjang')->where(['users_id'=>$users_id])->join('produk', 'produk.id', '=', 'keranjang.produk_id')->get();
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        $userDetails = User::find($users_id);
        // $user = User::where('id', $users_id)->first();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        
        return view('user.checkout', compact('daftarProvinsi', 'pesanan', 'pesanan_details'));
    }

    public function konfirmasi()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail)
        {
            $produk = Produk::where('id', $pesanan_detail->produk_id)->first();
            $produk->stok = $produk->stok-$pesanan_detail->qty;
            $produk->update();
        }

        return redirect('history/'.$pesanan_id);
    }

    public function getOngkir($city_id)
    {
        $users_id       = Auth::user()->id;
        $courier        = "jne";
        $daftarKota     = RajaOngkir::kota()->find(149);
        $city           = $daftarKota['city_id'];
        $destination    = $city_id;
        $berat          = DB::table('keranjang')->where(['users_id'=>$users_id])->sum('berat');
        $cost           = RajaOngkir::ongkosKirim([
            'origin'        => $city,
            'destination'   => $destination,
            'weight'        => $berat,
            'courier'       => $courier,
        ])->get();

        $ongkir = $cost[0]['costs'][0]['cost'][0]['value'];

        return $ongkir;
    }

    public function getCities($province_id)
    {
        $response = Http::withHeaders([
            'key' => '9cd68b2d1ac0dd405ff7c2a8c893836c'
        ])->get('https://pro.rajaongkir.com/api/city', [
            'province' => $province_id
        ]);

        return $response;
    }

    public function getDistrict($city_id)
    {
        $response = Http::withHeaders([
            'key' => '9cd68b2d1ac0dd405ff7c2a8c893836c'
        ])->get('https://pro.rajaongkir.com/api/subdistrict', [
            'city' => $city_id
        ]);

        return $response;
    }

    public function check_ongkir(Request $request)
    {
        $cost               = RajaOngkir::ongkosKirim([
            'origin'        => 149, //ID Kota/Kabupaten Asal
            'originType' => 'city',
            'destination'   => $request->city_origin, //Id Kota/Kabupaten Tujuan
            "destinationType"=> "subdistrict",
            'weight'        => 2000, //berat barang
            'courier'       => $request->courier
        ])->get();

        return response()->json($cost);
    }

    public function pesanan (Request $request)
    {
        $data = $request->all();
        $users_id = Auth::user()->id;
        $produk = Produk::where('id', $data['produk_id'])->first();
        if ($produk->stok < $data['qty']) {
            return redirect()->back()->with('flash_message_error', 'Maaf yang anda masukkan melebihi stok!');
        }
        else {
            $berat = ($data['berat']*$data['qty']);
            $jumlah_produk =DB::table('keranjang')->where(['produk_id'=>$data['produk_id'],'users_id'=>$users_id])->count();
            if($jumlah_produk>0){
                return redirect()->back()->with('flash_message_error','Produk sudah ada di keranjang');
            }else{
                keranjang::insert([
                    'produk_id'=>$data['produk_id'],
                    'users_id'=>$users_id,
                    'harga'=>$data['harga'],
                    'berat'=>$berat,
                    'qty'=>$data['qty'],
                    'ongkir'=>$data['ongkir']
                ]);
                return view('pesan')->with('flash_message_success','Pesanan anda berhasil dilakukan');
            }
        }
    }

    public function ongkir()
    {
        $response = Http::get('https://pro.rajaongkir.com/api/city', [
            'province_id' => 'Taylor',
            'page' => 1,
        ]);
    }

    public function detail_check(Request $request)
    {
        $users_id   = Auth::user()->id;
        $userDetails = User::find($users_id);

        return view('user.detailcheckout');
    }

    public function transaksi(Request $request)
    {
        $user_id                    = Auth::user()->id;
        $user_email                 = Auth::user()->email;
        $userDetails = User::find($users_id);
        $data                       = $request->all();
        $pesanan                     = new Pesanan;
        $pesanan->user_id           = $user_id;
        $userDetails->nama              = $data['nama'];
        $pesanan->biaya_ongkir      = $data['biaya_ongkir'];
        $pesanan->total_bayar       = $data['total'];
        $pesanan->metode_pembayaran = $data['metode_pembayaran'];
        $pesanan->status            = 'Baru';
        $pesanan->kode              = mt_rand(100, 999);
        $pesanan->save();  

        if ($pesanan->id) {
            return redirect('/history');
        }
    }

    public function form($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        
        return view('history.form', compact('pesanan'));
    }

    // public function add_form(Request $request)
    // {
    //     if ($request->isMethod('post')){
    //         $data = $request->all();

    //         $data_form = new Konfirmasi;
    //         $data_form->$nama_member=$data['nama_member'];
    //         $data_form->dosis=$data['dosis'];
    //         $data_form->indikasi=$data['indikasi'];
  
    //         $data_produk->save();
    //         return redirect('/dataproduk')->with('sukses', 'Data Berhasil Diinput'); 
    //     }
    // }

    public function send_wa(Request $request)
    {
        $pesan = "*Konfirmasi Pembayaran*
        No Pesanan : $request->id_pesanan
        Nama Member : $request->nama
        Tanggal Pesanan : $request->tanggal
        Jumlah Pesanan : $request->jumlah_harga
        Nomor Rekening/ : $request->no_rek
        Jumlah Transfer : $request->jumlah_transfer 
        Tanggal Transfer : $request->tanggal_transfer

        *Silahkan Upload Bukti Pembayaran*";
        return Http::get("https://wa.me/6287727933012?text=$pesan");
    }

}
