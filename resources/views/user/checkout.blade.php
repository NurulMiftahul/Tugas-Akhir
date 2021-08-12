@extends('user.master')

@section('content')

<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="{{url('/assets/img/co.jpg')}}" alt="fashion img">
    <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2 style="margin-top: -40px;">Checkout</h2>
        <!-- <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>                    -->
          <!-- <li class="active">Checkout</li> -->
        <!-- </ol> -->
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

 <!-- Cart view section -->
 <section id="checkout">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="checkout-area">
          <form action="/pesanan" method="post">
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse">
                        <form action="/pesanan" method="post">
                        @csrf
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                              <p>Nama Lengkap</p>
                                <input type="text" placeholder="Nama Lengkap*" name="name"  id="name">
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                              <p>No Telpon</p>
                                <input type="text" placeholder="No Telepon*" name="no_telp"  id="no_telp">
                              </div>
                            </div>
                          </div> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                              <p>Email</p>
                                <input type="email" placeholder="Alamat Email" name="email" value="">
                              </div>                             
                            </div>                            
                          </div>  
                          <!-- <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                              <p>Provinsi</p>
                                <select name="province_origin" on change="province()" id="address" required>
                                  <option value="-" selected disabled>-- Pilih Provinsi --</option>
                                  @foreach($daftarProvinsi as $key => $pv)
                                  <option value="{{$pv['province_id']}}">{{$pv['province']}}</option>
                                  @endforeach
                                </select>
                              </div>                             
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                              <p>Kabupaten / Kota Asal</p>
                                <select class="form-control" id="city_origin" name="city_origin">
                                  <option value="">-- Pilih Kota Asal --</option>
                                </select>
                              </div>
                            </div>
                          </div>  -->
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                              <p>Kecamatan</p>
                                <select class="form-control" id="subdistrict_origin" name="subdistrict_origin">
                                  <option value="">-- Pilih Kecamatan --</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                              <p>Kurir</p>
                                <select class="form-control" onchange="cek()" name="courier" id="courier">
                                  <option value="-">-- Pilih Kurir --</option>
                                  <option value="jne">JNE</option>
                                  <option value="pos">POS</option>
                                  <option value="tiki">TIKI</option>
                                </select>
                              </div>                             
                            </div>  
                                                     
                          </div>   
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <p>Alamat Lengkap</p>
                                <textarea name="alamat"  cols="8" rows="3"></textarea>
                              </div>                             
                            </div>                            
                          </div>                                    
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<!-- 
              <div class="col-md-4">
                    <div class="checkout-right">
                      <h4>Pesanan Anda</h4>
                        <div class="aa-order-summary-area">
                          <table class="table table-responsive">
                            <thead>
                              <tr>
                                <th>Produk</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                              
                               
                                    
                                  </tbody>
                                  <tfoot>
                                 
                                 
                                  <tr>
                                      <th>Subtotal </th>
                                     
                                    </tr>
                                  <tr>
                                      <th> <span id="ongkir"></span> Ongkir</th>
                                      <th> <span id="ongkir"></span></th>
                                    </tr>
                                  </tfoot>
                          </table>
                        
                        </div>
                    </div>
                  
                  
                  
                  </div> -->

              <div class="col-md-4">
                <div class="checkout-right">
                  <!-- <h4>Orderan Anda</h4>
                    <div class="aa-order-summary-area">
                      <div class="checkout__order__products">Products <span>Total</span></div>
                        
                  </div> -->
                  <h4>Pesanan Anda</h4>
                  @if(!empty($pesanan))
                  <p>Tanggal Pesan : {{$pesanan->tanggal}}</p>
                        <div class="aa-order-summary-area">
                          <table class="table table-responsive">
                            <thead>
                              <tr>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                              </tr>
                            </thead>
                              <?php $total = 0; ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                  <tbody>
                                  <tr>
                                  <td>{{ $pesanan_detail->produk->nama_produk }} <strong>x</strong> {{ $pesanan_detail->qty }} </td>
                                    <td>Rp. {{ number_format($pesanan_detail->produk->harga,null,null,'.') }}</td>
                                    <td> Rp. {{ number_format($pesanan_detail->jumlah_harga,null,null,'.') }}</td>
                                  </tr>
                                    
                                  </tbody>
                                  <tfoot>
                                  <?php $total = $total + ($pesanan_detail->harga*$pesanan_detail->qty); ?>
                                  @endforeach
                                  <tr>
                                      <th> Ongkir </th>
                                      <th><span id="ongkir"></span></th>
                                    </tr>
                                  <tr>
                                  <th>Total </th>
                                  <input type="hidden" name="total" value="{{$total}}" >
                                      <td><span id="subtotal" data-nilai="{{$pesanan->jumlah_harga}}">Rp.  <?php echo number_format($pesanan->jumlah_harga,null,null,'.'); ?></span></td>
                                      <!-- <th> <span id="ongkir"></span></th> -->
                                    </tr>
                                    
                                  </tfoot>
                          </table>
                          <a href="{{ url('konfirmasi_checkout') }}" class="btn btn-success" onclick="return confirm('Anda Yakin Akan Checkout?');">
                      <i class=" fa fa-shopping-cart"></i>Checkout
                    </a>
                        </div>
                    @endif
                  <!-- <h4>Metode Pembayaran</h4>
                  <div class="aa-payment-method">                    
                    <label for="cashdelivery"><input type="radio" id="cashdelivery" name="metode_pembayaran"> Bayar Ditempat </label>
                    <label for="paypal"><input type="radio" id="paypal" name="metode_pembayaran" checked> Via Transfer Bank </label> -->
                    <!-- <img src="https://seeklogo.com/images/B/bank-bri-logo-8DC31E9AEF-seeklogo.com.png" border="0" width="20px" alt="PayPal Acceptance Mark">     -->
                    <!-- <input type="submit" value="Place Order" class="aa-browse-btn">  -->
                    <!-- <a href="{{ url('konfirmasi_checkout') }}" class="btn btn-success" onclick="return confirm('Anda Yakin Akan Checkout?');">
                      <i class=" fa fa-shopping-cart"></i>Checkout
                    </a> -->
                    <!-- <a href="{{url('/transaksi/tambah')}}">Beli</a>                -->
                  </div>
                </div>
                
              </div>
              
            </div>
          </form>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

 @stop
 @push('js_lib')
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous"></script> -->
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

        });

        let isProcessing = false;
        const cek = () => {
            event.preventDefault();

            let city_origin      = $('select[name=subdistrict_origin]').val();
            let courier          = $('select[name=courier]').val();
       
            if(isProcessing){
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/ongkir",
                data: {
                    city_origin:         city_origin,
                    courier:             courier,
                },
                dataType: "JSON",
                type: "POST",
                success: function (response) {
                    isProcessing = false;
                    console.log(response);
                    if (response) {
                        console.log(response);
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function (key, value) {
                            $('#ongkir').append('<li class="list-group-item"> <input type="radio" onchange="total(this)" id="harga_ongkir" name="biaya_ongkir" value="'+ value.cost[0].value +'" > '+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+numberWithCommas(value.cost[0].value)+' ('+value.cost[0].etd+' hari)</li>')
                        });
                    }
                    
                },
                error:function(err){
                  console.log(err);
                }
            });
        }

        function total(){
            var harga_ongkir = parseInt($('#harga_ongkir:checked').val());
            var subtotal = parseInt($('#subtotal').data('nilai'));
            var total = harga_ongkir + subtotal;
            $('#subtotal').text('Rp. '+numberWithCommas(total));
        }

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?<!\.\d*)(?=(\d{3})+(?!\d))/g, ".");
        }

    </script>
    @endpush