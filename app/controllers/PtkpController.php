<?php

class PtkpController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data ptkp
   *
   * @return View
   */
   
  public function index()
  {
    // data semua ptkp
    $data = Ptkpku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.ptkp', compact('data', 'tipe'));
  }

  /**
   * proses cari ptkp
   * 
   * @return View
   */
  public function search()
  {
    // cari ptkp
    $data = Ptkp::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.ptkp', compact('data', 'tipe'));
  }

  /**
   * form tambah ptkp
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.ptkp', compact('tipe'));
  }


  /**
   * proses tambah ptkp
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiPtkp::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPtkp::errors() );
    }

    // tambah ptkp
    $tambah = Ptkp::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'ptkp gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ptkp sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah ptkp
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $ptkp = Ptkpku::set($id);
    $tipe     = 'rubah';

    return View::make('form.ptkp', compact('ptkp', 'tipe'));
  }

  /**
   * proses rubah ptkp
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPtkp::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPtkp::errors() );
    }

    // rubah ptkp
    $rubah = Ptkp::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'ptkp gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ptkp sukses dirubah.');

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
    // hapus ptkp
    Ptkpku::hapus($id);
  }

}