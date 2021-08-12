@extends('admin.master')

@section('content')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="white-box">
                                    <form class="form-horizontal form-material" action="/kategori/{{$data_kategori->id}}/editkategori" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0" for="exampleInputEmail1"><h5><strong>Nama Kategori :</strong></h5></label>
                                                <div class="col-md-12 border-bottom p-0">
                                                    <input name="nama_kategori" type="text" class="form-control p-0 border-0" value="{{$data_kategori->nama_kategori}}">
                                                </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label class="col-md-12 p-0" for="exampleInputEmail1"><h5><strong>Deskripsi :</strong></h5></label>
                                                <div class="col-md-12 border-bottom p-0 ">
                                                    <input name="deskripsi" type="text" class="form-control p-0 border-1" value="{{$data_kategori->deskripsi}}" >
                                                </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-warning">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>  
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>


@stop