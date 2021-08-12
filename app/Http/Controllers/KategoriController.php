<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $data_kategori = Kategori::all();
        return view('admin.indexkategori', compact('data_kategori'));
    }

    public function create(Request $request)
    {
        $data_kategori = Kategori::create($request->all());
        return redirect ('/kategori')->with('success', 'Kategori : '. $data_kategori->nama_kategori . 'Berhasil Ditambahkan');
    }

    public function store(Request $request)
    {
        $data = $request->except('_method', '_token', 'submit');

        $validator = Validator::make($request->all().[
         'nama_kategori' => 'required|string|min:3',
         'deskripsi' => 'required|string|min:3',
        ]);

        if($validator->fails()){
            return redirect()->Back()->withInput()->withErrors($validator);
        }

        if($record = Kategori::firstOrCreate($data)){
            Session::flash('message', 'Added Successfully!');
            Session::flash('alert-class', 'alert-success');
            return redirect()->route('kategori');
         }else{
            Session::flash('message', 'Data not saved!');
            Session::flash('alert-class', 'alert-danger');
         }
   
         return Back();
    }

    public function edit($id)
    {
        $data_kategori = Kategori::find($id);
        return view('admin.editkategori', compact('data_kategori'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
            ]);

            $data_kategori = Kategori::find($id);
            $data_kategori->nama_kategori = $request->nama_kategori;
            $data_kategori->deskripsi = $request->deskripsi;

            $data_kategori->save();

            return redirect('/kategori')->with('sukses', 'Data Berhasil Diubah');
    }
}
