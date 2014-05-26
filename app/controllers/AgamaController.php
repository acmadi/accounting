<?php

class AgamaController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data agama
   *
   * @return View
   */
   
  public function index()
  {
    // data semua agama
    $data = Agamaku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.agama', compact('data', 'tipe'));
  }

  /**
   * proses cari agama
   * 
   * @return View
   */
  public function search()
  {
    // cari agama
    $data = Agama::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.agama', compact('data', 'tipe'));
  }

  /**
   * form tambah agama
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.agama', compact('tipe'));
  }


  /**
   * proses tambah agama
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiAgama::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAgama::errors() );
    }

    // tambah agama
    $tambah = Agama::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'agama gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'agama sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah agama
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $agama = Agamaku::set($id);
    $tipe     = 'rubah';

    return View::make('form.agama', compact('agama', 'tipe'));
  }

  /**
   * proses rubah agama
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiAgama::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAgama::errors() );
    }

    // rubah agama
    $rubah = Agama::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'agama gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'agama sukses dirubah.');

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
    // hapus agama
    Agamaku::hapus($id);
  }

}