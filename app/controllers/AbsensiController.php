<?php

class AbsensiController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data absensi
   *
   * @return View
   */
  public function index()
  {
    // data semua absensi
    $data = Absensiku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.absensi', compact('data', 'tipe'));
  }

  /**
   * proses cari absensi
   * 
   * @return View
   */
  public function search()
  {
    // cari absensi
    $data = Absensi::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.absensi', compact('data', 'tipe'));
  }

  /**
   * form tambah absensi
   *
   * @return View
   */
  public function create()
  {
    $karyawan  		= Karyawanku::semua();
	
    $tipe     = 'buat';

    return View::make('form.absensi', compact('karyawan', 'tipe'));
  }


  /**
   * proses tambah absensi
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiAbsensi::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAbsensi::errors() );
    }

    // tambah absensi
    $tambah = Absensi::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Absensi gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Absensi sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah absensi
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $absensi		= Absensiku::set($id);
	$karyawan  		= Karyawanku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.absensi', compact('absensi', 'karyawan', 'tipe'));
  }

  /**
   * proses rubah absensi
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiAbsensi::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAbsensi::errors() );
    }

    // rubah absensi
    $rubah = Absensi::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'absensi gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'absensi gaji sukses dirubah.');

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
    // hapus absensi
    Absensiku::hapus($id);
  }

  
  

}