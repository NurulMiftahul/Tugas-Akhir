@extends('admin.master')

@section('content')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if(session()->has('message'))
        <div class="alert alert-primary" role="alert">
            {{ session('message') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Daftar User</h4>
                    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th> ID Pesanan</th>
                            <th> Member  </th>
                            <th> Tanggal Pemesanan </th>
                            <th> Jumlah Pemesanan </th>
                            <th> No. Rekening </th>
                            <th> Jumlah Transfer </th>
                            <th> Tanggal Transfer </th>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                            <tr>
                                <td> {{ $data->pesanan_id }} </td>
                                
                                <td>  {{ $member }} </td>
                                <td>  {{ $pesanan }} </td>
                                <td> {{ $konfirmasi }} </td>
                                <td> {{ $pesanan_detail}}</td>
            
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDevice">Tambah Data Pembayaran</button>

                <!-- Modal -->
                <div class="modal fade" id="tambahDevice" tabindex="-1" role="dialog" aria-labelledby="tambahDeviceLongTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form class="form" method="POST" action="{{ route('tambah.device') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="card-header">
                                        <h4 class="description text-center text-primary">Tambah Data Pembayaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">password</i></div>
                                                </div>
                                                <input type="text" class="form-control" name="key" placeholder="Kunci Perangkat...">
                                            </div>
                                        </div>

                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">account_circle</i></div>
                                                </div>
                                                <select class="form-control" id="user" name="user" aria-label="Default select example" onchange="landSelect()">
                                                    <option selected>Pilih Petani...</option>
                                                    @foreach($data['petani'] as $user => $orang)
                                                    <option value="{{ $orang->id }}">{{ $orang->username }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">local_library</i></div>
                                                </div>
                                                <select class="form-control" id="land" name="land" aria-label="Default select example" onchange="plantSelect()">
                                                    <option selected>Pilih Lahan...</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group bmd-form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text"><i class="material-icons">grass</i></div>
                                                </div>
                                                <select class="form-control" id="plant" name="plant" aria-label="Default select example">
                                                    <option selected>Pilih Tanaman...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan Data Tanaman</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@stop