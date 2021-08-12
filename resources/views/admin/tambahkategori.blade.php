@extends('admin.master')

@section('content')

<h3>Data Pegawai</h3>
 
	<a href="/kategori"> Kembali</a>
	
	<br/>
	<br/>
 
	<form action="/kategori" method="post">
		{{ csrf_field() }}
		Nama <input type="text" name="nama_kategori" required="required"> <br/>
		Jabatan <input type="text" name="deskripsi" required="required"> <br/>
		<!-- Umur <input type="number" name="umur" required="required"> <br/>
		Alamat <textarea name="alamat" required="required"></textarea> <br/> -->
		<input type="submit" value="Simpan Data">
	</form>

@stop 