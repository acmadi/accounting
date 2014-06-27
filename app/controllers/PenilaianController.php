<?php

class PenilaianController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data lembur
   *
   * @return View
   */
   
  public function index()
  {
    // data semua penilaian
    $data = Penilaianku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.penilaian', compact('data', 'tipe'));
  }

  /**
   * proses cari penilaian
   * 
   * @return View
   */
  public function search()
  {
    // cari penilaian
    $data = Penilaian::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.penilaian', compact('data', 'tipe'));
  }

  /**
   * form tambah penilaian
   *
   * @return View
   */
   
  public function create()
  {
    $absensi  		= Absensiku::semua();

	
    $tipe     = 'buat';

    return View::make('form.penilaian', compact('absensi', 'tipe'));
  }


  /**
   * proses tambah penilaian
   *
   * @return Redirect
   */
   
  public function store()
  {
    // validasi gagal
    if (! ValidasiPenilaian::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPenilaian::errors() );
    }

    // tambah lembur
    $tambah = Penilaian::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Penilaian gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Penilaian sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah penilaian
   *
   * @param  int  $id
   * @return Response
   */
   
  public function edit($id)
  {
    // data
    $penilaian		= Penilaianku::set($id);
	$absensi		= Absensiku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.penilaian', compact('penilaian', 'absensi', 'tipe'));
  }

  /**
   * proses rubah tunjangan 
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPenilaian::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPenilaian::errors() );
    }

    // rubah penilaian
    $rubah = Penilaian::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'penilaian gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'penilaian sukses dirubah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * hapus data
   *
   * @param  int  $id
   * @return Response
   */
   
  public function destroy($id)
  {
    // hapus penilaian
    Penilaianku::hapus($id);
  }

  
}