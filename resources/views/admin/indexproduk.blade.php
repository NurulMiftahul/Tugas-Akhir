@extends('admin.master')

@section('content')

<div class="page-wrapper">

<div class="col-sm-4">
        <div class="form-group form-inline">
            <label>Keyword</label>
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
        </div>
    </div>
    <div class="col-sm-4">
        <button id="search" name="search" class="btn btn-warning"><i class="fa fa-search"></i> Cari</button>
    </div>

    <form action="{{ url('cari') }}" method="GET">
		{{ @csrf_field() }}
		<input type="text" name="nama_produk" placeholder="Ingin mencari apa ?" class="form-control"><br>
		<input type="submit" class="btn btn-md btn-outline-primary" >
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
                                <table class="table table-bordered" cellspacing="0" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Nama Produk</th>
                                            <th class="border-top-0" >Dosis</th>
                                            <th class="border-top-0">Indikasi</th>
                                            <th class="border-top-0">Efek Samping</th>
                                            <th class="border-top-0">Harga</th>
                                            <th class="border-top-0">Stok</th>
                                            <th class="border-top-0">Di Produksi</th>
                                            <th class="border-top-0">Kategori</th>
                                            <th class="border-top-0" >Deskripsi</th>
                                            <th class="border-top-0">Berat</th>
                                            <th class="border-top-0">Gambar</th>
                                            <th class="border-top-0">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i =1 @endphp
                                    @foreach ($data_produk as $produk)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$produk->nama_produk}}</td>
                                            <td ><p>{{$produk->dosis}}</p></td>
                                            <td ><p>{{$produk->indikasi}}</p></td>
                                            <td ><p>{{$produk->efek_samping}}</p></td>
                                            <td>{{$produk->harga}}</td>
                                            <td>{{$produk->stok}}</td>
                                            <td>{{$produk->tmpt_produksi}}</td>
                                            <td>{{$produk->kategori->nama_kategori}}</td>
                                            <td ><p>{{$produk->deskripsi}}</p></td>
                                            <td>{{$produk->berat}}</td>
                                            <td>
                                                <img src="{{asset('/assets/img/produk/'.$produk->gambar)}}" width="100px">
                                            </td>

                                            <td>
                                            <a class="btn btn-info btn-sm" href="#"><i class="glyphicon glyphicon-th-large">Lihat</i></a>
                                            <a class="btn btn-primary btn-sm" href="/dataproduk/{{$produk->id}}/editproduk"><i class="glyphicon glyphicon-pencil">Edit</i></a>
                                            <a href="/dataproduk/{{$produk->id}}/destroy" class="btn btn-danger btn-sm" onclick="return confirm('Yakin data ini mau dihapus ?')">Delete</a>
                                            <!-- <button type="submit" style="display: inline;" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash">Hapus</i></button> -->
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
				        <form action="/dataproduk/create" method="post" enctype="multipart/form-data">
				        	{{ csrf_field() }}
						  <div class="form-group">
						    <label for="exampleInputNamaLengkap">Nama Produk</label>
						    <input name = "nama_produk" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Dosis</label>
						    <input name = "dosis" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Indikasi</label>
						    <input name = "indikasi" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Efek Samping</label>
						    <input name = "efek_samping" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Harga</label>
						    <input name = "harga" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Stok</label>
						    <input name = "stok" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Tempat Produksi</label>
						    <input name = "tmpt_produksi" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Kategori</label>
						        <select name = "kategori_id" class="form-control">
                                    <option>-- Pilih Kategori --</option>
                                    @foreach ($kategori as $ka)
                                    <option value="{{$ka->id}}">{{$ka->nama_kategori}}</option>
						            @endforeach
                                </select>
                          </div>
						  <div class="form-group">
						    <label for="exampleInputEmail">Deskripsi</label>
						    <input name = "deskripsi" type="text" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Deskripsi">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Berat</label>
						    <input name = "berat" type="text" class="form-control" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
						  </div>
                          <div class="form-group">
						    <label for="exampleInputNamaLengkap">Gambar</label>
						    <input name = "gambar" type="file" class="form-control-file" id="exampleInputNamaKategori" aria-describedby="emailHelp" placeholder="Nama Kategori">
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