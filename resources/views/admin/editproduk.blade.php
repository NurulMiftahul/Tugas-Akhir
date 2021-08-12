@extends('admin.master')

@section('content')
<div class="page-wrapper">
    <div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-12">
            <div class="card">
                <form action="/dataproduk/{{$data_produk->id}}/editproduk" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Produk</label>
                            <input name="nama_produk" type="text" class="form-control" value="{{$data_produk->nama_produk}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dosis</label>
                            <input name="dosis" type="text" class="form-control" value="{{$data_produk->dosis}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Indikasi</label>
                            <input name="indikasi" type="text" class="form-control" value="{{$data_produk->indikasi}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Efek Samping</label>
                            <input name="efek_samping" type="text" class="form-control" value="{{$data_produk->efek_samping}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga</label>
                            <input name="harga" type="text" class="form-control" value="{{$data_produk->harga}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Stok</label>
                            <input name="stok" type="text" class="form-control" value="{{$data_produk->stok}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tempat Produksi</label>
                            <input name="tmpt_produksi" type="text" class="form-control" value="{{$data_produk->tmpt_produksi}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori</label>
                            <select name="kategori_id" class="form-control">
                                @foreach ($kategori as $ka)
                                @if($data_produk->kategori_id == $ka->id)
                                <option selected value="{{$ka->id}}">
                                {{$ka->nama_kategori}}</option>
                               @else
                                <option value="{{$ka->id}}">
                                {{$ka->nama_kategori}}</option>
                                @endif
                                @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Deskripsi</label>
                            <input name="deskripsi" type="text" class="form-control" value="{{$data_produk->deskripsi}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Berat</label>
                            <input name="berat" type="text" class="form-control" value="{{$data_produk->berat}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gambar</label>
                            <input name="gambar" type="file" class="form-control" aria-describedby="emailHelp" >
                        <input type="hidden" name="oldGambar" value="{{$data_produk->gambar}}">
                        @if(!empty($data_produk->gambar))
                        <img src="{{asset('assets/img/produk/'.$data_produk->gambar)}}" style="width:50px;">
                        @endif
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