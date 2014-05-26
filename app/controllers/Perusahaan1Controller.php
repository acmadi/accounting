<?php

class Perusahaan1Controller extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data perusahaan1
   *
   * @return View
   */
   
  public function index()
  {
    // data semua perusahaan1
    $data = Perusahaan1ku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.perusahaan1', compact('data', 'tipe'));
  }

  /**
   * proses cari perusahaan1
   * 
   * @return View
   */
  public function search()
  {
    // cari perusahaan1
    $data = Perusahaan1::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.perusahaan1', compact('data', 'tipe'));
  }

  /**
   * form tambah perusahaan1
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.perusahaan1', compact('tipe'));
  }


  /**
   * proses tambah perusahaan1
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiPerusahaan1::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPerusahaan1::errors() );
    }

    // tambah perusahaan1
    $tambah = Perusahaan1::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'perusahaan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'perusahaan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah perusahaan1
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $perusahaan1 = Perusahaan1ku::set($id);
    $tipe     = 'rubah';

    return View::make('form.perusahaan1', compact('perusahaan1', 'tipe'));
  }

  /**
   * proses rubah perusahaan1
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPerusahaan1::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPerusahaan1::errors() );
    }

    // rubah perusahaan
    $rubah = Perusahaan1::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'perusahaan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'perusahaan sukses dirubah.');

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
    // hapus perusahaaan
    Perusahaan1ku::hapus($id);
  }

}