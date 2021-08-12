@extends('user.master')

@section('content')

 <!-- catg header banner section -->
 <section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Cart Page</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                   
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="/keranjang" method="post">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <!-- <th></th> -->
                        <th>Nama Produk</th>
                        <th>Harga Satuan</th>
                        <th>QTY</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php $total = 0; ?>
                            @foreach($usercart as $cart)
                      <tr>
                        <td><a class="remove" href="{{url('/hapuskeranjang/'.$cart->id)}}"><fa class="fa fa-close"></fa></a></td>
                        <!-- <td><a href="#"><img src="{{url('/assets/img/man/masker-sensi.jpg')}}" alt="img"></a></td> -->
                        <td><a class="aa-cart-title" href="#">{{ $cart->nama_produk }}</a></td>
                        <td>{{ number_format($cart->harga,null,null,'.') }}</td>
                        <td><input class="aa-cart-quantity" type="number" value="{{ $cart->qty }}"></td>
                        <td>{{number_format($cart->harga,null,null,'.') * $cart->qty}}</td>
                      </tr>
                      <tr>
                        <!-- <td colspan="6" class="aa-cart-view-bottom"> -->
                          <!-- <div class="aa-cart-coupon">
                            <input class="aa-coupon-code" type="text" placeholder="Coupon">
                            <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                          </div> -->
                          <!-- <input class="aa-cart-view-btn" type="submit" value="Update Keranjang"> -->
                        <!-- </td> -->
                      </tr>
                      <?php $total = $total + (number_format($cart->harga,null,null,'.')*$cart->qty); ?>
                      @endforeach
                      </tbody>
                    
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Total</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Total </th>
                     <td><?php echo $total; ?></td>
                   </tr>
                 </tbody>
               </table>
               <a href="/checkout" class="aa-cart-view-btn">Proced to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

@stop 