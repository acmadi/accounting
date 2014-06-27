<?php

class TunjanganController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data tunjangan
   *
   * @return View
   */
  public function index()
  {
    // data semua tunjangan
    $data = Tunjanganku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.tunjangan', compact('data', 'tipe'));
  }

  /**
   * proses cari tunjangan
   * 
   * @return View
   */
  public function search()
  {
    // cari tunjangan
    $data = Tunjangan::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.tunjangan', compact('data', 'tipe'));
  }

  /**
   * form tambah tunjangan
   *
   * @return View
   */
  public function create()
  {
    $absensi  		= Absensiku::semua();
	
    $tipe     = 'buat';

    return View::make('form.tunjangan', compact('absensi', 'tipe'));
  }


  /**
   * proses tambah tunjangan
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiTunjangan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiTunjangan::errors() );
    }

    // tambah tunjangan
    $tambah = Tunjangan::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Tunjangan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Tunjangan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah tunjangan
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $tunjangan		= Tunjanganku::set($id);
	$absensi  		= Absensiku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.tunjangan', compact('tunjangan', 'absensi', 'tipe'));
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
    if (! ValidasiTunjangan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiTunjangan::errors() );
    }

    // rubah tunjangan
    $rubah = Tunjangan::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'tunjangan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'tunjangan sukses dirubah.');

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
    Tunjanganku::hapus($id);
  }

  

}