<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Role
Route::get('role','RoleController@show');
Route::post('role','RoleController@create');
Route::put('role/{id}','RoleController@update');
Route::delete('role/{id}','RoleController@delete');

//Cabang
Route::get('cabang','CabangController@show');
Route::get('cabang/{id}','CabangController@showById');
Route::post('cabang','CabangController@create');
Route::put('cabang/{id}','CabangController@update');
Route::delete('cabang/{id}','CabangController@delete');

//Jasa Service
Route::get('jasaService','JasaServiceController@show');
Route::get('jasaService/{id}','JasaServiceController@showById');
Route::post('jasaService','JasaServiceController@create');
Route::put('jasaService/{id}','JasaServiceController@update');
Route::delete('jasaService/{id}','JasaServiceController@delete');

//Konsumen
Route::get('konsumen','KonsumenController@show');
Route::get('konsumen/{id}','KonsumenController@showById');
Route::post('konsumen','KonsumenController@create');
Route::put('konsumen/{id}','KonsumenController@update');
Route::delete('konsumen/{id}','KonsumenController@delete');

//Motor
Route::get('motor','MotorController@show');
Route::get('motor/{id}','MotorController@showById');
Route::post('motor','MotorController@create');
Route::put('motor/{id}','MotorController@update');
Route::delete('motor/{id}','MotorController@delete');

//Motor Konsumen
Route::get('motorKonsumen','MotorKonsumenController@show');
Route::get('motorKonsumen/{id}','MotorKonsumenController@showById');
Route::post('motorKonsumen','MotorKonsumenController@create');
Route::put('motorKonsumen/{id}','MotorKonsumenController@update');
Route::delete('motorKonsumen/{id}','MotorKonsumenController@delete');

//Pegawai
Route::get('pegawai','PegawaiController@show');
Route::get('pegawai/{id}','PegawaiController@showById');
Route::post('pegawai','PegawaiController@create');
Route::put('pegawai/{id}','PegawaiController@update');
Route::delete('pegawai/{id}','PegawaiController@delete');
Route::POST('/pegawai/mobileauthenticate','PegawaiController@mobileauthenticate');


//Supplier
Route::get('supplier','SupplierController@show');
Route::get('supplier/{id}','SupplierController@showById');
Route::post('supplier','SupplierController@create');
Route::put('supplier/{id}','SupplierController@update');
Route::delete('supplier/{id}','SupplierController@delete');

//Sparepart
Route::get('sparepart','SparepartController@show');
Route::get('sparepart/{kode}','SparepartController@showById');
Route::post('sparepart/store','SparepartController@create');
Route::post('sparepart/{kode}','SparepartController@update');
Route::post('sparepart/updateImageMobile/{kode}','SparepartController@updateImageMobile');
Route::delete('sparepart/{kode}','SparepartController@delete');

//Sparepart Cabang
Route::get('sparepartCabang','SparepartCabangController@show');
Route::get('sparepartCabang/{id}','SparepartCabangController@showById');
Route::get('sparepartCabang/stokKurang','SparepartCabangController@showStokKurang');
Route::post('sparepartCabang','SparepartCabangController@create');
Route::put('sparepartCabang/{id}','SparepartCabangController@update');
Route::delete('sparepartCabang/{id}','SparepartCabangController@delete');

//Pengadaan Sparepart
Route::get('pengadaanSparepart','PengadaanSparepartController@show');
Route::get('pengadaanSparepart/{id}','PengadaanSparepartController@showById');
Route::post('pengadaanSparepart','PengadaanSparepartController@create');
Route::put('pengadaanSparepart/{id}','PengadaanSparepartController@update');
Route::delete('pengadaanSparepart/{id}','PengadaanSparepartController@delete');

//Transaksi Penjualan
Route::get('transaksiPenjualan','TransaksiPenjualanController@show');
Route::get('transaksiPenjualan/{id}','TransaksiPenjualanController@showById');
Route::get('transaksiPenjualan/showLunas','TransaksiPenjualanController@showSudahLunas');
Route::post('transaksiPenjualanSV','TransaksiPenjualanController@createSV');
Route::post('transaksiPenjualanSP','TransaksiPenjualanController@createSP');
Route::post('transaksiPenjualanSS','TransaksiPenjualanController@createSS');
Route::put('transaksiPenjualan/{id}','TransaksiPenjualanController@update');
Route::delete('transaksiPenjualan/{id}','TransaksiPenjualanController@delete');

//Detil Transaksi Service
Route::get('detilJasa','DetilTransaksiServiceController@show');
Route::get('detilJasa/{id}','DetilTransaksiServiceController@showById');
Route::post('detilJasa','DetilTransaksiServiceController@create');
//Route::put('detilJasa/{id}','DetilTransaksiServiceController@update');
Route::delete('detilJasa/{id}','DetilTransaksiServiceController@delete');

//Detil Transaksi Sparepart
Route::get('detilSparepart','DetilTransaksiSparepartController@show');
Route::get('detilSparepart/{id}','DetilTransaksiSparepartController@showById');
Route::post('detilSparepart','DetilTransaksiSparepartController@create');
//Route::put('detilSparepart/{id}','DetilTransaksiSparepartController@update');
Route::delete('detilSparepart/{id}','DetilTransaksiSparepartController@delete');
