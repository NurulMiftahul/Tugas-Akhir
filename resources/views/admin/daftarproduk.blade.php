@extends('admin.master')

@section('content')
<style type="text/css">
		.pagination li{
			float: left;
			list-style-type: none;
			margin:5px;
		}
	</style>



<div class="page-wrapper">
<p>Cari Data Pegawai :</p>
	<form action="/daftarproduk/cari" method="GET">
		<input type="text" name="cari" placeholder="Cari Pegawai .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
    
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Produk</h3>
                                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                    <div class="d-md-flex">
                                        <button type="button" class="btn btn-danger d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white" data-toggle="modal" data-target="#exampleModal">Tambah Produk</button>
                                    </div>
                                </div>
                                                                
                            <!-- <p class="text-muted">Add class <code>.table</code></p> -->
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Satuan</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i =1 @endphp
                                    @foreach ($daftar_produk as $produk)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$produk->nama_produk}}</td>
                                            <td ><p>{{$produk->satuan}}</p></td>
                                            <td ><p>{{$produk->harga}}</p></td>
                                            <td ><p>{{$produk->harga_beli}}</p></td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="#"><i class="glyphicon glyphicon-th-large">Lihat</i></a>
                                                <a class="btn btn-primary btn-sm" href="/daftarproduk/{{$produk->id}}/editdaftar"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                                <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash">Hapus</i></button>
                                            </td>
                                        </tr>
                                    @endforeach    
                                    </tbody>
                                </table>
                                {{ $daftar_produk->links() }}
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
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Daftar Produk</h5>
				    </div>
				    <div class="modal-body">
				        <form action="/daftarproduk/create" method="post" enctype="multipart/form-data">
				        	{{ csrf_field() }}
						  <div class="form-group">
						    <label for="exampleInputNamaLengkap">Nama Produk</label>
						    <input name = "nama_produk" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Satuan</label>
						    <input name = "satuan" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Harga Jual</label>
						    <input name = "harga" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Harga Beli</label>
						    <input name = "harga_beli" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
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