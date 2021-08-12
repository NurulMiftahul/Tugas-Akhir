@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="card">
                <form action="/daftarproduk/{{$daftar_produk->id}}/editdaftar" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                            <input name="nama_produk" type="text" class="form-control" value="{{$daftar_produk->nama_produk}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Satuan</label>
                            <input name="satuan" type="text" class="form-control" value="{{$daftar_produk->satuan}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Jual</label>
                            <input name="harga" type="text" class="form-control" value="{{$daftar_produk->harga}}" readonly >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Beli</label>
                            <input name="harga_beli" type="text" class="form-control" value="{{$daftar_produk->harga_beli}}" >
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </form>
            </div>    
        </div>
    </div>
    </div>
    </div>


@stop