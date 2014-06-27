<?php

class StatusController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data status
   *
   * @return View
   */
   
  public function index()
  {
    // data semua status
    $data = Statusku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.status', compact('data', 'tipe'));
  }

  /**
   * proses cari status
   * 
   * @return View
   */
  public function search()
  {
    // cari status
    $data = Status::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.status', compact('data', 'tipe'));
  }

  /**
   * form tambah status
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.status', compact('tipe'));
  }


  /**
   * proses tambah status
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiStatus::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiStatus::errors() );
    }

    // tambah status
    $tambah = Status::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'status gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'status sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah status
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $status = Statusku::set($id);
    $tipe     = 'rubah';

    return View::make('form.status', compact('status', 'tipe'));
  }

  /**
   * proses rubah status
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiStatus::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiStatus::errors() );
    }

    // rubah status
    $rubah = Status::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'status gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'status sukses dirubah.');

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
    // hapus status
	Statusku::hapus($id);
  }

}