<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//PAGE CONTROLLER
Route::get('/dashboarduser', 'PageController@home');
Route::get('/obat', 'PageController@obat');
Route::get('/produk/{produk}', 'PageController@show')->name('produk.detail');
// Route::get('/detailproduk', 'PageController@detailproduk');
Route::get('/kategori/{kategori}', 'PageController@klik_kategori')->name('klik.kategori');
Route::get('/detailcheckout', 'PesanController@detailcheck');

//MEMBER
Route::get('/kontak', 'UserController@contact');
Route::match(['get','post'],'/', 'PageController@home');
// Route::get('/loginuser', 'AuthController@login')->name('loginuser');
// Route::post('/postlogin', 'AuthController@postlogin');
// Route::get('/registeruser', 'AuthController@register');
// Route::post('/postregister', 'AuthController@postregister');
Route::get('/produk-kategori/{kategori}', 'PageController@produk_kategori')->name('produk.kategori');
Route::get('/detail', 'UserController@detailproduk');


Route::get('/pengiriman', 'PesanController@cart')->name('pengiriman');
Route::get('/hapuskeranjang/{id}', 'PesanController@deletecart');
Route::get('/obat/cari', 'PageController@cari');

//ADMIN
Route::get('/dashboard', 'AdminController@index');
Route::get('/dataadmin', 'AdminController@dataadmin')->name('dataadmin');


//LOGIN ADMIN
Route::get('/registeradmin', 'AdminController@register')->name('registeradmin');
Route::post('/postregisteradmin', 'AdminController@postregister')->name('postregisadmin');
Route::get('/login/admin', 'AdminController@login')->name('loginadmin');
Route::post('/postloginadmin', 'AdminController@postlogin');
Route::get('/logout', 'AdminController@logout')->name('logout');
//
Route::get('/dashboard', 'AdminController@index');
Route::get('/datamember', 'AdminController@datamember');
Route::get('/kategori', 'KategoriController@index');
Route::post('/kategori/create', 'KategoriController@create');
Route::get('/kategori/{id}/editkategori', 'KategoriController@edit');
Route::post('/kategori/{id}/editkategori', 'KategoriController@update');
Route::get('/kategori/store', 'KategoriController@store');
Route::get('/datasupplier', 'SupplierController@index');
Route::post('/datasupplier/create', 'SupplierController@create');

//PRODUK
Route::get('/dataproduk', 'ProdukController@index');
Route::post('/dataproduk/create', 'ProdukController@create');
Route::get('/dataproduk/{id}/editproduk', 'ProdukController@edit');
Route::post('/dataproduk/{id}/editproduk', 'ProdukController@update');
Route::get('/dataproduk/{id}/destroy', 'ProdukController@destroy');

//DAFTAR PRODUK
Route::get('/daftarproduk', 'ProdukController@daftarProduk');
Route::post('/daftarproduk/create', 'ProdukController@addDaftar');
Route::get('/daftarproduk/{id}/editdaftar', 'ProdukController@editDaftar');
Route::post('/daftarproduk/{id}/editdaftar', 'ProdukController@updateDaftar');
Route::get('/datatable', 'AdminController@datatable');
Route::get('/daftarproduk/cari','ProdukController@cari');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/profilmember', 'MemberController@profilmember')->name('profilmember');
	Route::get('/editprofil', 'MemberController@editprofil')->name('editprofil');
	Route::patch('/profilmember', 'MemberController@update')
		->name('profilmember.update');
	// Route::get('/keranjang', 'PesanController@addtochart')->name('keranjang');
	Route::get('history', 'HistoryController@index');
Route::get('history/{id}', 'HistoryController@detail');
Route::get('/checkout', 'PesanController@checkout');

Route::post('/pesan/{id}', 'PesanController@addtochart');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

//Serba Serbi Ongkir
Route::post('/ongkir', 'PesanController@check_ongkir');
Route::get('/cities/{province_id}', 'PesanController@getCities');
Route::get('/subdistrict/{city_id}', 'PesanController@getDistrict');
Route::get('/detailcheckout', 'PesanController@detailcheck');
Route::get('/detail/{id}', 'PesanController@index');


Route::get('konfirmasi_checkout', 'PesanController@konfirmasi');
Route::post('/send-wa', 'PesanController@send_wa');
Route::get('/form-konfirmasi/{id}', 'PesanController@form');

//Konfirmasi Pembayaran Admin
Route::get('/kelolapembayaran/tambah', 'AdminController@add_konfirmasi')->name('kelolapembayaran');