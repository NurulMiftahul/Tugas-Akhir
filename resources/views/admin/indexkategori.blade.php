@extends('admin.master')

@section('content')

<div class="page-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Alert message (start) -->
                        @if(Session::has('message'))
                        <div class="alert {{ Session::get('alert-class') }}">
                            {{ Session::get('message') }}
                        </div>
                        @endif 
                        <!-- Alert message (end) -->
                        <div class="white-box">
                            <h3 class="box-title">Manajemen Kategori</h3>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                    <div class="d-md-flex">
                                        <button type="button" class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" data-toggle="modal" data-target="#exampleModal">Tambah Kategori</button>
                                    </div>
                                </div>
                                
                                
                            <!-- <p class="text-muted">Add class <code>.table</code></p> -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama Kategori</th>
                                            <th class="border-top-0">Deskripsi</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i =1 @endphp
                                    @foreach ($data_kategori as $kategori)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$kategori->nama_kategori}}</td>
                                            <td>{{$kategori->deskripsi}}</td>
                                            <td>
                                            <a class="btn btn-info btn-sm" href="#"><i class="glyphicon glyphicon-th-large">Lihat</i></a>
                                            <a class="btn btn-primary btn-sm" href="/kategori/{{$kategori->id}}/editkategori"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                           

                                            <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash">Hapus</i></button>
                                            
                                            
                                            
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				    <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
				        
				    </div>
				    <div class="modal-body">
				        <form action="/kategori/create" method="post">
				        	{{ csrf_field() }}
						  <div class="form-group">
						    <label for="exampleInputNamaLengkap">Nama Kategori</label>
						    <input name = "nama_kategori" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail">Deskripsi</label>
						    <input name = "deskripsi" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Deskripsi">
						  </div>
						  <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Submit</button>
				    	  </div>
						</form>
				    </div>
				    
				</div>
			</div>
		</div>


@stop