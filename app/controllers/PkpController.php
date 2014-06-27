<?php

class PkpController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data pkp
   *
   * @return View
   */
   
  public function index()
  {
    // data semua pkp
    $data = Pkpku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.pkp', compact('data', 'tipe'));
  }

  /**
   * proses cari pkp
   * 
   * @return View
   */
   
  public function search()
  {
    // cari pkp
    $data = Pkp::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.pkp', compact('data', 'tipe'));
  }

  /**
   * form tambah pkp
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.pkp', compact('tipe'));
  }


  /**
   * proses tambah pkp
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiPkp::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPkp::errors() );
    }

    // tambah pkp
    $tambah = Pkp::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'pkp gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pkp sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah pkp
   *
   * @param  int  $id
   * @return Response
   */
   
  public function edit($id)
  {
    // data
    $pkp = Pkpku::set($id);
    $tipe     = 'rubah';

    return View::make('form.pkp', compact('pkp', 'tipe'));
  }

  /**
   * proses rubah pkp
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPkp::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPkp::errors() );
    }

    // rubah pkp
    $rubah = Pkp::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'pkp gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pkp sukses dirubah.');

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
    // hapus pkp
    Pkpku::hapus($id);
  }

}