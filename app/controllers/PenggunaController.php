<?php

class PenggunaController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data pengguna
   *
   * @return View
   */
   
  public function index()
  {
    // data semua pengguna
    $data = User::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.pengguna', compact('data', 'tipe'));
  }

  /**
   * proses cari pengguna
   * 
   * @return View
   */
  public function search()
  {
    // cari pengguna
    $data = Pengguna::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.pengguna', compact('data', 'tipe'));
  }

  /**
   * form tambah pengguna
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.pengguna', compact('tipe'));
  }


  /**
   * proses tambah pengguna
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiPengguna::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPengguna::errors() );
    }

    // tambah pengguna
    $tambah = Pengguna::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'pengguna gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pengguna sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah pengguna
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $pengguna = User::set($id);
    $tipe     = 'rubah';

    return View::make('form.pengguna', compact('pengguna', 'tipe'));
  }
 
  

  /**
   * proses rubah pengguna
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPengguna::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPengguna::errors() );
    }

    // rubah pengguna
    $rubah = Pengguna::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'pengguna gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pengguna sukses dirubah.');

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
    // hapus pengguna
    User::hapus($id);
  }

}