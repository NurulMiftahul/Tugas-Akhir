<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Produk;
use App\Kategori;
use App\Admin;
use App\Pesanan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        $jumlah_produk = Produk::count();
        $jumlah_member = User::count();
        return view('admin.dashboardadmin', compact('jumlah_produk', 'jumlah_member'));
    }

    public function login()
    {
        return view('admin.loginadmin');
    }

    public function postlogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $query = Admin::where('email', $email)->first();

        if($query){
            if(Hash::check($password, $query->password)){
                Session::put('email', $query->email);
                Session::put('name', $query->name);
                Session::put('login/admin', TRUE);

                return redirect('/dashboard');
            }
            else{
                return redirect('/login/admin')->with('flash_message_success', 'Username Atau Password Salah');
            }
        }
        else{
            return redirect('/login/admin')->with('alert', 'Data Tidak Ada');
        }
    }

    public function register()
    {
        return view('admin.register');
    }

    public function postregister(Request $request)
    {
        Admin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login/admin')->with('alert-success', 'Kamu Berhasil Daftar');
    }

    public function datamember()
    {
        $user = User::all();
        
        return view('admin.datamember', compact('user'));
    }

    public function add_konfirmasi(){
        $data_pembayaran = AdminKonfirmasi::create($request->all());
        return redirect ('/kelolapembayaran')->with('success', 'Data Pembayaran : '. $data_pembayaran->id_pesanan . 'Berhasil Ditambahkan');
    }

    public function index_kelola()
    {
        $data = [
            'member' => User::all(),
            'pesanan' => new Pesanan,
            'konfirmasi' => new Konfirmasi,
            'pesanan_detail' => new PesananDetail,
        ];

        return view('admin.kelolapembayaran', compact('data'));
    }

    public function datatable()
    {
        return view ('admin.datatable');
    }

}
