@extends('user.master')

@section('content')

<section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{url('/assets/img/slider/h.jpg')}}" alt="Men slide img" />
              </div>
              <div class="seq-title">
                              
                <h2 data-seq>Vitamin</h2>                
                
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{url('/assets/img/slider/cart.jpg')}}" alt="Wristwatch slide img" />
              </div>
              <div class="seq-title">            
                <h2 data-seq>Obat-Obatan</h2>                
              </div>
            </li>
            <!-- single slide item -->
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{url('/assets/img/slider/covid.jpg')}}" alt="Shoes slide img" />
              </div>
              <div class="seq-title">
                                
                <h2 data-seq>COVID-19</h2>                
              </div>
            </li>
                              
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                 <!-- @foreach ($kategori as $item)
                 <li class="{{$item->id}}"><button class="btn_category" id="{{ $item->id }}">{{$item->nama_kategori}}</button></li>
                 @endforeach  -->
                 @foreach ($kategori as $item)
                 <li class="button"><a href="{{route('klik.kategori', $item->id)}}" >{{$item->nama_kategori}}</a></li>
                    @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                   
                    <div class="tab-pane fade in active" id="men">
                    
                      
                      <!-- <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a> -->
                    </div>
                    <!-- / men product category -->
                  </div>
                  <section id="aa-banner">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">        
                          <div class="row">
                            <div class="aa-banner-area">
                           
                            <a href="#"><img src="{{url('/assets/img/co2.jpg')}}" alt="fashion banner img"></a>
                            
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                  <!-- popular section -->  
                  <section id="aa-popular-category">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="aa-popular-category-area">
                              <!-- start prduct navigation -->
                                <ul class="nav nav-tabs aa-products-tab">
                                  <li><a href="#latest" data-toggle="tab">Terbaru</a></li>                    
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane fade in active" id="popular">
                                    <ul class="aa-product-catg">
                                    @foreach ($produk as $p)
                                    <li>
                                      <figure>
                                        <a class="aa-product-img" href="#"><img src="{{asset('/assets/img/produk/'.$p->gambar)}}" alt="image"></a>
                                        <a class="aa-add-card-btn" href="{{url('detail')}}/{{ $p->id}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                        <figcaption>
                                          <h4 class="aa-product-title"><a href="{{route('produk.detail', $p->nama_produk)}}">{{$p->nama_produk}}</a></h4>
                                          <span class="aa-product-price">Rp. {{number_format($p->harga,null,null,'.')}} </span> 
                                          
                                        </figcaption>
                                      </figure>                     
                                        <div class="aa-product-hvr-content">
                                          <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                          <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                          <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                                        </div>
                                    <!-- product badge -->
                                    <!-- <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                                   </li>
                                    @endforeach                           
                                    </ul>
                                  </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>PENGIRIMAN CEPAT</h4>
                <!-- <P>Dapatkan Pengiriman Cepat Menggunakan Kurir Berpengalaman</P> -->
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>DAPAT DITUKAR APABILA TERJADI KESALAHAN PEMESANAN DITEMPAT</h4>
                <!-- <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P> -->
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>BUKA SETIAP HARI DARI JAM 08.00-20.00</h4>
                <!-- <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->

 

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <!-- <h3>Subscribe our newsletter </h3> -->
            <p>Kritik dan Saran</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

@stop

