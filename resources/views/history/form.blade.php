@extends('user.master')
@section('content')
<div class="container">
                    <form action="{{url('/send-wa')}}" class="login-form" method="POST">
                                @csrf

								@if(Session::has('error'))
								<b class="text-danger">{{ Session::get('error') }}</b>
								@endif

                                <div class="form-group">
                                  <h5>Nomor Pesanan</h5>
		      			            <input type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="id_pesanan" readonly value="{{ $pesanan->id }}" required autocomplete="name" placeholder="nama" autofocus>
		      		                 
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror   
                                </div>

		      		            <div class="form-group">
                                  <h5>Id User</h5>
		      			            <input type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="nama" readonly value="{{ $pesanan->user_id }}" required autocomplete="name" placeholder="nama" autofocus>
		      		                 
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror   
                                </div>

	                            

                                <div class="form-group d-flex">
                                <h5>Tanggal Pemesanan</h5>
                                    <input  type="date" class="form-control rounded-left @error('email') is-invalid @enderror" name="tanggal" readonly value="{{ $pesanan->tanggal }}" required autocomplete="email" placeholder="email">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                <h5>Jumlah Harga</h5>
                                    <input  type="text" class="form-control rounded-left @error('email') is-invalid @enderror" name="jumlah_harga" readonly value="{{ $pesanan->jumlah_harga }}" required autocomplete="email" placeholder="email">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                <h5>No. Rekening</h5>
                                    <input  type="text" class="form-control rounded-left @error('email') is-invalid @enderror" name="no_rek"  required autocomplete="email" placeholder="xxxxxxxxxxxxx A.n/Nama Rekening">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                <h5>Jumlah Transfer</h5>
                                    <input type="text" class="form-control rounded-left @error('email') is-invalid @enderror" name="jumlah_transfer"  required autocomplete="email" placeholder="email">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                <h5>Tanggal Transfer</h5>
                                    <input type="date" class="form-control rounded-left @error('email') is-invalid @enderror" name="tanggal_transfer"  required autocomplete="email" placeholder="email">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                     
	                </div>
	                <div class="form-group d-md-flex">
	            	    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Daftar</button>
	                </div>
	          </form>
              </div>
@endsection

