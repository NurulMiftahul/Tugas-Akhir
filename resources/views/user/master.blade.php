<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Toko Obat Munggaran</title>
    
    <!-- Font awesome -->
    <link href="{{url('/assets/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{url('/assets/css/bootstrap.css')}}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{url('/assets/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/jquery.simpleLens.css')}}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{url('/assets/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{url('/assets/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{url('/assets/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{url('/assets/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>087-727-933-012</p>
                </div>
                <!-- / cellphone -->

                <!-- start currency -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-envelope"></span>Obatmunggaran@gmail.com</p>
                </div>
                <!-- / currency -->
                
              </div>
              <!-- / header top left -->
              
              <div class="aa-header-top-right">
              <!-- <div class="collapse navbar-collapse"> -->
                <ul class="aa-head-top-nav-right ">
                  <!-- <li><a href="account.html">My Account</a></li> -->
                  @if(empty(Auth::check()))
                  <li><a href="/login">Login</a></li>
                  @else
                  <li>
                  <div class="dropdown"><i class="fa fa-user"></i>
                  <button class="btn btn-s dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false" style="background: white;">
                      Akun Saya 
                      </button>
                      <!-- <i class="fa fa-user">My Acoount</i> -->
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <!-- <a class="dropdown-item" href="/dashboarduser">Dashboard</a> -->
                          <a class="dropdown-item" href="{{ url('/profilmember')}}"> <i class="fa fa-shopping-cart"></i> Profil Saya</a>
                          <a class="dropdown-item" href="#">Pesanan Saya</a>
                          <a class="dropdown-item" href="{{ url('history') }}">Riwayat Pemesanan</a>
                          <a class="dropdown-item" href="{{ __('logout') }}">Keluar</a>
                          <a class="dropdown-item" href="{{ url('form') }}">Form</a>
                        </div>
                  </div>
                  </li>
                  
                  <!-- <li><a href="#">My Account <span class="caret"></span></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">                
                        <li><a href="{{ url('/profilmember') }}">Profil Saya</a></li>
                        <li><a href="#">Pesanan Saya</a></li>
                        <li><a href="{{ __('logout') }}">Keluar</a></li>                                                
                      </ul>
                  </li> -->
                  <!-- <li class="hidden-xs"><a href="#">My Account</a></li> -->
                  <li class="hidden-xs"><a href="/keranjang">Keranjang Saya</a></li>
                  <li class="hidden-xs"><a href="{{ url('checkout') }}">Checkout</a></li>
                @endif
                </ul>
                </div>
              </div>
            <!-- </div> -->
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                   <img src="{{('/assets/img/logo2.png')}}" alt="logo img">
                </a>
                <!-- img based logo -->
               
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="/keranjang">
                <?php
                
               
                ?>
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  
                  <span class="aa-cart-notify">2</span>
                 
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{url('/assets/img/woman-small-2.jpg')}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="{{url('/assets/img/woman-small-1.jpg')}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="/obat/cari" method="get">
                  <input type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari di Toko Obat Munggaran ">
                  <button type="submit" value="cari"><span class="fa fa-search"></span></button>
                  
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->

  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="/">Beranda</a></li>
              <li><a href="#">Obat  <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Alergi & Bengkak</a></li>
                  <li><a href="#">Saluran Pernapasan</a></li>
                  <li><a href="#">Saluran Kemih & Prostat</a></li>
                  <li><a href="#">Saluran Pencernaan</a></li>                                                
                  <li><a href="#">Demam & Nyeri</a></li>
                  <li><a href="#">Metablisme</a></li>
                  <!-- <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a> -->
                    <!-- <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>                                      
                    </ul>
                  </li> -->
                </ul>
              </li>
              <li><a href="#">Bayi <span class="caret"></span></a>
                <ul class="dropdown-menu">  
                  <li><a href="#">Dot</a></li>                                                                
                  <li><a href="#">Pompa Payudara</a></li>              
                  <li><a href="#">Sabun & Shampo</a></li>
                  <li><a href="#">Bedak</a></li>
                  <li><a href="#">Minyak</a></li>                
                  <li><a href="#">Cream</a></li>
                  <li><a href="#">Popok Bayi</a></li>
                  <!-- <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>
                      <li><a href="#">And more.. <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Rings</a></li>
                          <li><a href="#">Earrings</a></li>
                          <li><a href="#">Jewellery Sets</a></li>
                          <li><a href="#">Lockets</a></li>
                          <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>                       
                          <li><a href="#">Jeans</a></li>
                          <li><a href="#">Polo T-Shirts</a></li>
                          <li><a href="#">SKirts</a></li>
                          <li><a href="#">Jackets</a></li>
                          <li><a href="#">Tops</a></li>
                          <li><a href="#">Make Up</a></li>
                          <li><a href="#">Hair Care</a></li>
                          <li><a href="#">Perfumes</a></li>
                          <li><a href="#">Skin Care</a></li>
                          <li><a href="#">Hand Bags</a></li>
                          <li><a href="#">Single Bags</a></li>
                          <li><a href="#">Travel Bags</a></li>
                          <li><a href="#">Wallets & Belts</a></li>                        
                          <li><a href="#">Sunglases</a></li>
                          <li><a href="#">Nail</a></li>                       
                        </ul>
                      </li>                   
                    </ul>
                  </li> -->
                </ul>
              </li>
              <!-- <li><a href="#">Kecantikan <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Skincare</a></li>
                  <li><a href="#">Kosmetik</a></li>
                  <li><a href="#">Lain-lain</a></li> -->
                  <!-- <li><a href="#">Standard</a></li>                                                
                  <li><a href="#">T-Shirts</a></li>
                  <li><a href="#">Shirts</a></li>
                  <li><a href="#">Jeans</a></li>
                  <li><a href="#">Trousers</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>                                      
                    </ul>
                  </li> -->
                <!-- </ul>
              </li> -->
              <li><a href="#">P3K</a></li>
              <li><a href="#">COVID-19</a></li>
             <li><a href="#">Nutrisi/Vitamin <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Camera</a></li>
                  <li><a href="#">Mobile</a></li>
                  <li><a href="#">Tablet</a></li>
                  <li><a href="#">Laptop</a></li>                                                
                  <li><a href="#">Accesories</a></li>                
                </ul>
              </li>
              <li><a href="/kontak">Kontak</a></li>
              <!-- <li><a href="#">Furniture</a></li>            
              <li><a href="blog-archive.html">Blog <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="blog-archive.html">Blog Style 1</a></li>
                  <li><a href="blog-archive-2.html">Blog Style 2</a></li>
                  <li><a href="blog-single.html">Blog Single</a></li>                
                </ul>
              </li>
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="product.html">Shop Page</a></li>
                  <li><a href="product-detail.html">Shop Single</a></li>                
                  <li><a href="404.html">404 Page</a></li>                
                </ul>
              </li> -->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
@yield('content')

<!-- footer -->  
<footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Knowledge Base</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Delivery</a></li>
                      <!-- <li><a href="#">Returns</a></li> -->
                      <li><a href="#">Services</a></li>
                      <!-- <li><a href="#">Discount</a></li> -->
                      <li><a href="#">Special Offer</a></li>
                    </ul>
                  </div>
                </div>
              </div>
             
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Kontak Kami</h3>
                    <address>
                      <p> Jl. Raya Jatibarang-Indramayu, Pawidean, Kec. Jatibarang, Kabupaten Indramayu, Jawa Barat 45273</p>
                      <p><span class="fa fa-phone"></span>087727933012</p>
                      <p><span class="fa fa-envelope"></span>obatmunggaran@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    
  </footer>
  <!-- / footer -->

  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <form class="aa-login-form" action="">
            <label for="">Username or Email address<span>*</span></label>
            <input type="text" placeholder="Username or email">
            <label for="">Password<span>*</span></label>
            <input type="password" placeholder="Password">
            <button class="aa-browse-btn" type="submit">Login</button>
            <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="account.html">Register now!</a>
            </div>
          </form>
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{url('/assets/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{url('/assets/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{url('/assets/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{url('/assets/js/sequence.js')}}"></script>
  <script src="{{url('/assets/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{url('/assets/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{url('/assets/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{url('/assets/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{url('/assets/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert')
  <script src="{{url('/assets/js/custom.js')}}"></script> 
  <script>
  $('.btn_category').click((e) => {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        dataType: "json",
        data: {
          kategori: e.target.id
        },
        success: (data) => {
          console.log(data)
        }
      })
    })
    
  $("#address").change(function() {
    $('#city_origin').html(`<option disabled selected><b>-- Pilih Kota / Kabupaten --</b></option>`)
      $( "#address option:selected" ).each(function() {
        let option = $(this).context.value
        console.log('provinsi '+option)
        $.ajax({
          url: '/cities/'+option,
          method: "GET",
          dataType: "json",
          data: {},
          success: (data) => {
            data.rajaongkir.results.map((data) => {
              $('#city_origin').append(`<option value="${data.city_id}">${data.city_name}</option>`)
            })
          }
        })
      });
    });

    // $("#city_origin").change(function() {
    $('#subdistrict_origin').html(`<option disabled selected><b>-- Pilih Kecamatan --</b></option>`)
      // $( "#city_origin option:selected" ).each(function() {
        // let option = $(this).context.value
        // console.log('kota '+option)
        $.ajax({
          url: '/subdistrict/149',
          method: "GET",
          dataType: "json",
          data: {},
          success: (data) => {
            data.rajaongkir.results.map((data) => {
              $('#subdistrict_origin').append(`<option value="${data.subdistrict_id}">${data.subdistrict_name}</option>`)
            })
          }
        // })
      });
    // });
  </script>

  @stack('js_lib')

  </body>
</html>

