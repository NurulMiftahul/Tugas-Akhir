<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\Produk;
use App\Kategori;
use Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::get();
        $data_produk = Produk::all();
        
        return view('admin.indexproduk', compact('kategori', 'data_produk'));
    }

    

    public function create(Request $request)
    {
        // if ($request->isMethod('post')){
            $data = $request->all();

            if ($request->hasfile('gambar'))
            {
                $destination_path   = 'public/assets/img/produk';
                $gambar             = $request->file('gambar');
                $image_name         = $gambar->getClientOriginalName();
                $path               = $request->file('gambar')->storeAs($destination_path, $image_name);

                $input['gambar']    = $image_name;
                Produk::create([
                    'nama_produk' =>  $data['nama_produk'],
                    'dosis' => $data['dosis'],
                    'indikasi' => $data['indikasi'],
                    'harga' => $data['harga'],
                    'efek_samping' => $data['efek_samping'],
                    'stok' => $data['stok'],
                    'tmpt_produksi' => $data['tmpt_produksi'],
                    'kategori_id' => $data['kategori_id'],
                    'deskripsi' => $data['deskripsi'],
                    'berat' => $data['berat'],
                    'gambar' => $input['gambar'],
                ]);    
            }

            
            
            return redirect('/dataproduk')->with('sukses', 'Data Berhasil Diinput');  
        }

        public function edit($id)
        {
            $data_produk = Produk::find($id);
            $kategori = Kategori::get();
            return view('admin.editproduk', compact('data_produk', 'kategori'));
        }

        public function update($id, Request $request)
        {
            $this->validate($request, [
                'nama_produk'   => 'required',
                'dosis'         => 'required',
                'indikasi'      => 'required',
                'efek_samping'  => 'required',
                'harga'         => 'required',
                'stok'          => 'required',
                'tmpt_produksi' => 'required',
                'kategori_id'   => 'required',
                'deskripsi'     => 'required',
                'berat'         => 'required',
                'gambar'        => 'required|image|mimes:png,jpg,gif,jpeg|max:2048'
            ]);

            $imageName = $request->oldGambar;

            if($request->file('gambar')){
                $imageName = $request->file('gambar')->getClientOriginalName();

                $request->file('gambar')->move('assets/img/produk',$imageName);
            }

            $data_produk = Produk::find($id);
            $data_produk->nama_produk = $request->nama_produk;
            $data_produk->dosis = $request->dosis;
            $data_produk->indikasi = $request->indikasi;
            $data_produk->efek_samping = $request->efek_samping;
            $data_produk->harga = $request->harga;
            $data_produk->stok = $request->stok;
            $data_produk->tmpt_produksi = $request->tmpt_produksi;
            $data_produk->kategori_id = $request->kategori_id;
            $data_produk->deskripsi = $request->deskripsi;
            $data_produk->berat = $request->berat;
            $data_produk->gambar = $imageName;
            $data_produk->save();
            return redirect('/dataproduk')->with('sukses', 'Data Berhasil DiUpdate');
        }

        public function destroy($id)
        {
            $data_produk = Produk::find($id);
            $data_produk->delete($data_produk->id);
        
        return redirect('/dataproduk')->with('sukses','Data Berhasil Dihapus');
        }

        public function daftarProduk()
        {
            
            $daftar_produk = DB::table('produk')->paginate(5);
            return view('admin.daftarproduk', ['daftar_produk' => $daftar_produk]);
        }
    
        public function addDaftar(Request $request)
        {
            // if ($request->isMethod('post')){
                $data = $request->all();
    
                    Produk::create([
                        'nama_produk' =>  $data['nama_produk'],
                        'satuan' =>  $data['satuan'],
                        'harga' => $data['harga'],
                        'harga_beli' => $data['harga_beli'],
                    ]);    

                return redirect('/daftarproduk')->with('sukses', 'Data Berhasil Diinput');  
            }
    
            public function editDaftar($id)
            {
                $daftar_produk = Produk::find($id);
                
                return view('admin.editdaftar', compact('daftar_produk'));
            }
    
            public function updateDaftar($id, Request $request)
            {
                $this->validate($request, [
                    
                    'satuan' => 'required',
                    
                    'harga_beli' => 'required',
                ]);
    
                $daftar_produk = Produk::find($id);
                
                $daftar_produk->satuan = $request->satuan;
               
                $daftar_produk->harga_beli = $request->harga_beli;

                $daftar_produk->save();
                return redirect('/daftarproduk')->with('sukses', 'Data Berhasil DiUpdate');
            }

            public function cari(Request $request){
                $cari = $request->cari;

                $daftar_produk = DB::table('produk')
                ->where('nama_produk','like',"%".$cari."%")
                ->paginate();

                return view('admin.daftarproduk',['daftar_produk' => $daftar_produk]);
            }
}
