<?php

Route::get('register', function()
{
 return View::make('register');
});

Route::get('register', 'UserController@register'); 
Route::post('store', 'UserController@store');


/**
 * login
 */

Route::get('login', array(
  'as'   => 'login',
  'uses' => 'LoginController@form'
));

Route::post('login', array(
  'uses' => 'LoginController@proses'
));


/**
 * end of login
 */

 
 
 
 
 /**
 * login marketing
 */

Route::get('loginmarketing', array(
  'as'   => 'loginkaryawan',
  'uses' => 'LoginmarketingController@form'
));

Route::post('loginmarketing', array(
  'uses' => 'LoginmarketingController@proses'
));


/**
 * end of login marketing
 */
 
 
 
Route::get('/', array(
  'as'   => 'home',
  'uses' => 'PemasokController@index'
));


/**
 * pengguna
 */
Route::post('pengguna/cari', array(
  'as'   => 'cari_pengguna',
  'uses' => 'PenggunaController@search'
));

Route::resource('pengguna', 'PenggunaController', array(
  'except' => array('show')
));

/**
 * end of pengguna
 */

 
 
 /**
 * agama
 */
Route::post('agama/cari', array(
  'as'   => 'cari_agama',
  'uses' => 'AgamaController@search'
));

Route::resource('agama', 'AgamaController', array(
  'except' => array('show')
));

/**
 * end of agama
 */


 
 /**
 * departemen
 */
Route::post('departemen/cari', array(
  'as'   => 'cari_departemen',
  'uses' => 'DepartemenController@search'
));

Route::resource('departemen', 'DepartemenController', array(
  'except' => array('show')
));

/**
 * end of departemen
 */

 
 /**
 * jabatan
 */
Route::post('jabatan/cari', array(
  'as'   => 'cari_jabatan',
  'uses' => 'JabatanController@search'
));

Route::resource('jabatan', 'JabatanController', array(
  'except' => array('show')
));

/**
 * end of jabatan
 */


 
 /**
 * golongan
 */
Route::post('golongan/cari', array(
  'as'   => 'cari_golongan',
  'uses' => 'GolonganController@search'
));

Route::resource('golongan', 'GolonganController', array(
  'except' => array('show')
));

/**
 * end of golongan
 */ 
 
 

 /**
 * ptkp
 */
Route::post('ptkp/cari', array(
  'as'   => 'cari_ptkp',
  'uses' => 'PtkpController@search'
));

Route::resource('ptkp', 'PtkpController', array(
  'except' => array('show')
));

/**
 * end of ptkp
 */  
 


 /**
 * perusahaan1
 */
Route::post('perusahaan1/cari', array(
  'as'   => 'cari_perusahaan1',
  'uses' => 'Perusahaan1Controller@search'
));

Route::resource('perusahaan1', 'Perusahaan1Controller', array(
  'except' => array('show')
));

/**
 * end of perusahaan1
 */  




 /**
 * marketing
 */
Route::post('marketing/cari', array(
  'as'   => 'cari_marketing',
  'uses' => 'MarketingController@search'
));

Route::resource('marketing', 'MarketingController', array(
  'except' => array('show')
));

/**
 * end of marketing
 */  
 
 
 
  /**
 * karyawan
 */
Route::post('karyawan/cari', array(
  'as'   => 'cari_karyawan',
  'uses' => 'KaryawanController@search'
));

Route::resource('karyawan', 'KaryawanController', array(
  'except' => array('show')
));

/**
 * end of karyawan
 */ 



 /**
 * owner
 */
Route::post('owner/cari', array(
  'as'   => 'cari_owner',
  'uses' => 'OwnerController@search'
));

Route::resource('owner', 'OwnerController', array(
  'except' => array('show')
));

/**
 * end of owner
 */ 


Route::resource('detail', 'PenggunaController', array(
  'except' => array('show')
));

 
 


/**
 * pengaturan
 */
Route::get('profil', array(
  'as'   => 'profil',
  'uses' => 'ProfilController@form'
));

Route::post('profil', array(
  'uses' => 'ProfilController@proses'
));

Route::get('perusahaan', array(
  'as'   => 'perusahaan',
  'uses' => 'PerusahaanController@form'
));

Route::post('perusahaan', array(
  'uses' => 'PerusahaanController@proses'
));
/**
 * end of pengaturan
 */

Route::get('logout', array(
  'as'   => 'logout',
  'uses' => 'LogoutController@proses'
));