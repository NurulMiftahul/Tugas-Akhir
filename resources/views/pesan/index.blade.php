@extends('user.master')

@section('content')

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('/assets/img/produk/'.$produk->gambar)}}" class="simpleLens-lens-image"><img src="{{asset('/assets/img/produk/'.$produk->gambar)}}" class="simpleLens-big-image"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                <form action="{{ url('pesan') }}/ {{ $produk->id}}" method="post">
                @csrf
                <input type="hidden" name="produk_id" value="{{$produk->id}}">
                  <input type="hidden" name="harga" value="{{$produk->harga}}">
                  <input type="hidden" name="berat" value="{{$produk->berat}}">
                  <div class="aa-product-view-content">
                    <h3>{{$produk->nama_produk}}</h3>
                    <div class="aa-price-block">
                      <p class="dosis"><b>Dosis                   : </b>{{$produk->dosis}}</p>
                      <p class="indikasi"><b>Indikasi             : </b>{{$produk->indikasi}}</p>
                      <p class="efek"><b>Efek Samping             : </b>{{$produk->efek_samping }}</p>
                      <p class="aa-product-view-price"><b>Harga   : </b>{{number_format($produk->harga,null,null,'.') }}</p>
                      <p class="aa-product-avilability"><b>Stok   :</b>{{$produk->stok}}</span></p>
                      <p class="aa-product-avilability"><b>Berat  :</b>{{$produk->berat}}</span></p>
                      <span><b>Diproduksi Oleh : </b></span> <span>{{$produk->tmpt_produksi}}</span>
                      
                      <div class="quantity">
                        <input type="button" onclick="decrementValue()" value="-" />
                        <input type="text" name="qty" value="1" maxlength="2" max="10" size="1" id="number" />
                        <input type="button" onclick="incrementValue()" value="+" />
                      </div>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p> -->
                    <!-- <h4>Size</h4>
                    <div class="aa-prod-view-size">
                      <a href="#">S</a>
                      <a href="#">M</a>
                      <a href="#">L</a>
                      <a href="#">XL</a>
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                      <a href="#" class="aa-color-green"></a>
                      <a href="#" class="aa-color-yellow"></a>
                      <a href="#" class="aa-color-pink"></a>                      
                      <a href="#" class="aa-color-black"></a>
                      <a href="#" class="aa-color-white"></a>                      
                    </div> -->
                    <!-- <div class="aa-prod-quantity">Stok :
                      <form action="">
                        <select id="" name="">
                          <option selected="1" value="0">1</option>
                          <option value="1">2</option>
                          <option value="2">3</option>
                          <option value="3">4</option>
                          <option value="4">5</option>
                          <option value="5">6</option>
                        </select>
                      </form>
                      <p class="aa-prod-category">
                      
                      </p>
                    </div> -->
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Masukkan Kerajang</a>
                      <!-- <a class="aa-add-to-cart-btn" href="#">Wishlist</a> -->
                      <!-- <a class="aa-add-to-cart-btn" href="#">Compare</a> -->
                    </div>
                    <button class="primary-btn">TAMBAHKAN KE KERANJANG</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li>
                  <a href="#" data-toggle="tab" aria-expanded="true">Deskripsi Obat</a>
                </li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{{$produk->deskripsi }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
  <script type="text/javascript">
function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
            document.getElementById('number').value = value;
    }
}
function decrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
            document.getElementById('number').value = value;
    }

}
</script>
@stop 