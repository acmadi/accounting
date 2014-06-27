<?php namespace Lela\Proses;

class Pph42 {

  /**
   * tambah pph42
   * 
   * @return bool
   */
  public function tambah()
  {
    // input

    $kd_perusahaan		= \Input::get('kd_perusahaan');
	
	$id_pph42	     	= \Input::get('id_pph42');
    $jumlah_omzet     	= \Input::get('jumlah_omzet');	
	$bulan  			= \Input::get('bulan');
	$tahun  			= \Input::get('tahun');
	$tanggal  			= \Input::get('tanggal');
	$nama_penyetor  	= \Input::get('nama_penyetor');

    $data    = compact('kd_perusahaan', 'id_pph42', 'jumlah_omzet', 'bulan', 'tahun', 'tanggal', 'nama_penyetor');
	
    // tambah pph42
    $tambah = \Pph42ku::tambah($data);

    // gagal tambah
    if (! $tambah)
      return false;

    // sukses tambah
    return true;
  }

  /**
   * cari pph42   * 
   * @return pph42
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
      $data  = \Pph42ku::cari($kolom, $tipe, $cari);
    // urutkan
    else
      $data  = \Pph42ku::urut($kolom, $tipe);

    return $data;
}


  /**
   * rubah Pph42
   * 
   * @param  int  $id id Pph42
   * @return bool
   */
  public function rubah($id)
  {
    // input
    
    $kd_perusahaan		= \Input::get('kd_perusahaan');
	
	$id_pph42	     	= \Input::get('id_pph42');
    $jumlah_omzet     	= \Input::get('jumlah_omzet');	
	$bulan  			= \Input::get('bulan');
	$tahun  			= \Input::get('tahun');
	$tanggal  			= \Input::get('tanggal');
	$nama_penyetor  	= \Input::get('nama_penyetor');
	
    $data    = compact('kd_perusahaan', 'id_pph42', 'jumlah_omzet', 'bulan', 'tahun', 'tanggal', 'nama_penyetor');

    // rubah pph42
    $rubah = \Pph42ku::rubah($id, $data);

    // gagal rubah
    if (! $rubah)
      return false;

    // sukses rubah
    return true;
  }
  

}