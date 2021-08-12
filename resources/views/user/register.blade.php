<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Register Member</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="{{url('/loginmember/dist/style.css')}}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<form action="{{route('register')}}" method="post">
@csrf
<div class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
    <h2>Please Sign In</h2>
    <input id="name" type="text" class="form-control rounded-left @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Masukkan Nama">
      @error('name')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror   
    
      <input id="email" type="email" class="form-control rounded-left @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Masukkan Email" autocomplete="email">
	    @error('email')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
       @enderror


       <input id="password" type="password" class="form-control rounded-left @error('password') is-invalid @enderror" name="password" placeholder="Masukkan Password" required autocomplete="new-password">
	     @error('password')
       <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
        @enderror


        <input id="password-confirm" type="password" class="form-control rounded-left" name="password_confirmation" placeholder="Konfirmasi Password" required autocomplete="new-password">
	       @error('email')
         <span class="invalid-feedback" role="alert">
         <strong>{{ $message }}</strong>
          </span>
          @enderror

    <h2>&nbsp;</h2>
    <button type="sumbit" class="btn btn-primary">Register</button>
  </div>
</div>
</form>
<!-- partial -->
  <script src='https://codepen.io/banik/pen/3f837b2f0085b5125112fc455941ea94.js'></script>
</body>
</html>
