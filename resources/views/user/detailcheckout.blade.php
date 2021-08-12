@extends('user.master')

@section ('content')

    <section class="breadcrumb-section set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span> Detail Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code -->
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <div class="details-checkout">
                    <table border="1" width="100%">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No Telp</th>
                        <th>Email</th>
                        <th>Provinsi</th>
                        <th>Kabupaten/kota</th>
                        <th>Kurir</th>
                        <th>Alamat Lengkap</th>
                        <th>Produk</th>
                        <th>Status</th>
                        <th>Ongkir</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                     <?php echo $no = 1; ?>
                     @foreach($pesanans as $pesanan)
                     <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->nama }}</td>
                            <td>{{ $pesanan->email }}</td>
                            <td>{{ $pesanan->province_id }}</td>
                            <td>{{ $pesanan->city_id }}</td>
                            <td>{{ $pesanan->courier }}</td>
                            <td>{{ $pesanan->alamat }}</td>
                            <td>{{ $pesanan->product_id</td>
                            <td>
                                @if($status != 1)
                                Sudah Pesan & Belum Bayar
                                @else
                                Sudah dibayar
                                @endif
                            </td>                     
                     </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    