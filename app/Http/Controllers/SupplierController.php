<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Str;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $data_supplier = Supplier::all();

        return view('admin.indexsupplier', compact('data_supplier'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->all();

            $data_supplier = new Supplier;
            $data_supplier->nama_supplier=$data['nama_supplier'];
            $data_supplier->alamat=$data['alamat'];
        }
            $data_supplier->save();
            return redirect('/datasupplier')->with('sukses', 'Data Berhasil Diinput');  
    }

    public function edit($id)
    {
        $data_supplier = Supplier::find($id);
        return view('admin.ed', compact('data_kategori'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request,[
            'nama_supplier' => 'required',
            'alamat' => 'required'
            ]);

            $data_supplier = Supplier::find($id);
            $data_supplier->nama_supplier = $request->nama_supplier;
            $data_supplier->alamat = $request->alamat;

            $data_supplier->save();

            return redirect('/supplier')->with('sukses', 'Data Berhasil Diubah');
    }

        
}
