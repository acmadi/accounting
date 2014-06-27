<?php namespace Lela\Proses;

class Ppn {

  /**
   * tambah ppn
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_perusahaan				= \Input::get('kd_perusahaan');
	
	$kd_ppn	     				= \Input::get('kd_ppn');
    $ppn_pembelian     			= \Input::get('ppn_pembelian');	
	$ppn_penjalan  				= \Input::get('ppn_penjalan');
	$bulan  					= \Input::get('bulan');
	$tahun  					= \Input::get('tahun');
	$biaya_membangun_sendiri  	= \Input::get('biaya_membangun_sendiri');
	$penomoran_faktur  			= \Input::get('penomoran_faktur');
	$penjualan_tanpa_faktur  	= \Input::get('penjualan_tanpa_faktur');
	
    $data    = compact('kd_perusahaan', 'kd_ppn', 'ppn_pembelian', 'ppn_penjalan', 'bulan', 'tahun', 'biaya_membangun_sendiri', 'penomoran_faktur', 'penjualan_tanpa_faktur');
	
	
    // tambah ppn
    $tambah = \Ppnku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari ppn   * 
   * @return ppn
   */
  public function cari()
  {
    // input
    $urut  = explode('-', \Input::get('sort'));
    $kolom = $urut[0];
    $tipe  = $urut[1];
    $cari  = \Input::get('cari');

    // cari
    if (! empty($cari))
      $data  = \Ppnku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Ppnku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah ppn
   * 
   * @param  int  $id id ppn
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_perusahaan				= \Input::get('kd_perusahaan');
	
	$kd_ppn	     				= \Input::get('kd_ppn');
    $ppn_pembelian     			= \Input::get('ppn_pembelian');	
	$ppn_penjalan  				= \Input::get('ppn_penjalan');
	$bulan  					= \Input::get('bulan');
	$tahun  					= \Input::get('tahun');
	$biaya_membangun_sendiri  	= \Input::get('biaya_membangun_sendiri');
	$penomoran_faktur  			= \Input::get('penomoran_faktur');
	$penjualan_tanpa_faktur  	= \Input::get('penjualan_tanpa_faktur');
	
    $data    = compact('kd_perusahaan', 'kd_ppn', 'ppn_pembelian', 'ppn_penjalan', 'bulan', 'tahun', 'biaya_membangun_sendiri', 'penomoran_faktur', 'penjualan_tanpa_faktur');

    // rubah ppn
    $rubah = \Ppnku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}