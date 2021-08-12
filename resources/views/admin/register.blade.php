<!doctype html>
<html lang="en">
  <head>
  	<title>Register Adminn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{url('/loginadmin/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register Admin</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	        <div class="icon d-flex align-items-center justify-content-center">
		      		        <span class="fa fa-user-o"></span>
		      	        </div>
		      	            <h3 class="text-center mb-4">Have an account?</h3>
						        <form action="/postregisteradmin" class="login-form" method="POST">
                                @csrf

								@if(Session::has('error'))
								<b class="text-danger">{{ Session::get('error') }}</b>
								@endif
		      		            <div class="form-group">
		      			            <input id="nama" type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="name" placeholder="nama" autofocus>
		      		                 
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror   
                                </div>

	                            <div class="form-group d-flex">
                                    <input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                    <input id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">
	                            
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group d-flex">
                                    <input id="password-confirm" type="password" class="form-control rounded-left" name="password_confirmation" required autocomplete="new-password" placeholder="konfirmasi password">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

								<!-- <div class="form-group d-flex">
                                    <input id="alamat" type="alamat" class="form-control rounded-left" name="alamat" required autocomplete="new-password">
	                            
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> -->

	                            
	                </div>
	                <div class="form-group d-md-flex">
	            	    <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Daftar</button>
	                </div>
	          </form>
	        </div>
		</div>
	</div>
</div>
</section>

	<script src="{{url('/loginadmin/js/jquery.min.js')}}"></script>
  <script src="{{url('/loginadmin/js/popper.js')}}"></script>
  <script src="{{url('/loginadmin/js/bootstrap.min.js')}}"></script>
  <script src="{{url('/loginadmin/js/main.js')}}"></script>

	</body>
</html>

