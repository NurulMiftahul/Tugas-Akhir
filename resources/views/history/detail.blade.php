@extends('user.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-1">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                    <p align="left">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <table class="table table-bordered mt-1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                               
                                <th>Total Harga</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan_detail->produk->nama_produk }}</td>
                                <td>{{ $pesanan_detail->qty }} </td>
                                <td colspan="1" align="left">Rp. {{ number_format($pesanan_detail->produk->harga) }}</td>
                                
                                <td colspan="1" align="left">Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                                <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            
                            
                             <tr>
                                <td colspan="4" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td ><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                
                            </tr>
                            <tr>
                                <td colspan="4" align="right"> <strong> Upload Bukti Transfer</strong></td>
                            <td><a href="{{ url('/form-konfirmasi', $pesanan->id) }}"> klik untuk mengirim bukti transfer</a></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection