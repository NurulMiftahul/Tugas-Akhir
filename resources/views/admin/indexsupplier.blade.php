@extends('admin.master')

@section('content')


<div class="page-wrapper">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Supplier</h3>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                    <div class="d-md-flex">
                                        <button type="button" class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" data-toggle="modal" data-target="#exampleModal">Tambah Produk</button>
                                    </div>
                                </div>
                            <!-- <p class="text-muted">Add class <code>.table</code></p> -->
                            <div class="table-responsive mt-3">
                                <table class="table text-nowrap table-striped table-bordered">
                                    <thead class="thead-dark" style="text-align :center; style: bold;">
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama Supplier</th>
                                            <th class="border-top-0">Alamat</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i =1 @endphp
                                    @foreach ($data_supplier as $supplier)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$supplier->nama_supplier}}</td>
                                            <td>{{$supplier->alamat}}</td>
                                            <td>
                                            <a class="btn btn-primary btn-sm" href="/datasupplier/{{$supplier->id}}/editsupplier"><i class="glyphicon glyphicon-pencil">Edit</i></a>
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
				        <h5 class="modal-title" id="exampleModalLabel" style="text-align : center;">Tambah Data Supplier</h5>
				    </div>
				    <div class="modal-body">
				        <form action="/datasupplier/create" method="post" enctype="multipart/form-data">
				        	{{ csrf_field() }}
						  <div class="form-group">
						    <label for="exampleInputNamaLengkap">Nama Supplier</label>
						    <input name = "nama_supplier" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Supplier">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Alamat</label>
						    <input name = "alamat" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Alamat">
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