<?php


Route::get('signup', array('as'=>'guest.signup', 'uses'=>'GuestController@signup'));

Route::get('activate', array('as'=>'users.activate', 'uses'=>'RegisterownerController@activate'));


Route::get('register', 'RegisterownerController@register'); 
Route::post('store', 'RegisterownerController@store');



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
  'as'   => 'loginmarketing',
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

 
 
 
 
 /**
 * harga
 */
Route::post('harga/cari', array(
  'as'   => 'cari_harga',
  'uses' => 'HargaController@search'
));

Route::resource('harga', 'HargaController', array(
  'except' => array('show')
));

/**
 * end of harga
 */ 
 




 
 /**
 * potongan
 */
Route::post('potongan/cari', array(
  'as'   => 'cari_potongan',
  'uses' => 'PotonganController@search'
));

Route::resource('potongan', 'PotonganController', array(
  'except' => array('show')
));

/**
 * end of potongan
 */ 
 


 
 /**
 * pkp
 */
Route::post('pkp/cari', array(
  'as'   => 'cari_pkp',
  'uses' => 'PkpController@search'
));

Route::resource('pkp', 'PkpController', array(
  'except' => array('show')
));

/**
 * end of pkp
 */ 




 /**
 * detailgaji
 */
Route::post('detailgaji/cari', array(
  'as'   => 'cari_detailgaji',
  'uses' => 'DetailgajiController@search'
));

Route::resource('detailgaji', 'DetailgajiController', array(
  'except' => array('show')
));

/**
 * end of detail gaji
 */ 
 

 
 

 /**
 * absensi
 */
Route::post('absensi/cari', array(
  'as'   => 'cari_absensi',
  'uses' => 'AbsensiController@search'
));

Route::resource('absensi', 'AbsensiController', array(
  'except' => array('show')
));

/**
 * end of absensi
 */  





 /**
 * tunjangan
 */
Route::post('tunjangan/cari', array(
  'as'   => 'cari_tunjangan',
  'uses' => 'TunjanganController@search'
));

Route::resource('tunjangan', 'TunjanganController', array(
  'except' => array('show')
));

/**
 * end of tunjangan
 */  




 
 
 /**
 * lembur
 */
Route::post('lembur/cari', array(
  'as'   => 'cari_lembur',
  'uses' => 'LemburController@search'
));

Route::resource('lembur', 'LemburController', array(
  'except' => array('show')
));

/**
 * end of lembur
 */  


 
 /**
 * penilaian
 */
Route::post('penilaian/cari', array(
  'as'   => 'cari_penilaian',
  'uses' => 'PenilaianController@search'
));

Route::resource('penilaian', 'PenilaianController', array(
  'except' => array('show')
));

/**
 * end of penilaian
 */  




 /**
 * pph
 */
Route::post('pph/cari', array(
  'as'   => 'cari_pph',
  'uses' => 'PphController@search'
));

Route::resource('pph', 'PphController', array(
  'except' => array('show')
));

/**
 * end of pph
 */  




 /**
 * support ticket
 */
Route::post('supportticket/cari', array(
  'as'   => 'cari_supportticket',
  'uses' => 'SupportticketController@search'
));

Route::resource('supportticket', 'SupportticketController', array(
  'except' => array('show')
));

/**
 * end of support ticket
 */  



 
 
 /**
 * ticket reply
 */
Route::post('ticketreply/cari', array(
  'as'   => 'cari_ticketreply',
  'uses' => 'TicketreplyController@search'
));

Route::resource('ticketreply', 'TicketreplyController', array(
  'except' => array('show')
));

/**
 * end of ticket reply
*/  





 /**
 * agenda
 */
Route::post('agenda/cari', array(
  'as'   => 'cari_agenda',
  'uses' => 'AgendaController@search'
));

Route::resource('agenda', 'AgendaController', array(
  'except' => array('show')
));

/**
 * end of agenda
*/  
 



 /**
 * pph42
 */
Route::post('pph42/cari', array(
  'as'   => 'cari_pph42',
  'uses' => 'Pph42Controller@search'
));

Route::resource('pph42', 'Pph42Controller', array(
  'except' => array('show')
));

/**
 * end of pph42
*/  




 /**
 * gaji
 */
Route::post('gaji/cari', array(
  'as'   => 'cari_gaji',
  'uses' => 'GajiController@search'
));

Route::resource('gaji', 'GajiController', array(
  'except' => array('show')
));

/**
 * end of gaji
*/  





 /**
 * sewa
 */
Route::post('sewa/cari', array(
  'as'   => 'cari_sewa',
  'uses' => 'SewaController@search'
));

Route::resource('sewa', 'SewaController', array(
  'except' => array('show')
));

/**
 * end of sewa
*/  





 /**
 * ppn
 */
Route::post('ppn/cari', array(
  'as'   => 'cari_ppn',
  'uses' => 'PpnController@search'
));

Route::resource('ppn', 'PpnController', array(
  'except' => array('show')
));

/**
 * end of ppn
*/  


 
 
 
  /**
 * ppn
 */
Route::post('status/cari', array(
  'as'   => 'cari_status',
  'uses' => 'StatusController@search'
));

Route::resource('status', 'StatusController', array(
  'except' => array('show')
));

/**
 * end of status
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