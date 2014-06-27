<?php

class HargaController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data harga
   *
   * @return View
   */
   
  public function index()
  {
    // data semua harga
    $data = Hargaku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.harga', compact('data', 'tipe'));
  }

  /**
   * proses cari harga
   * 
   * @return View
   */
  public function search()
  {
    // cari harga
    $data = Harga::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.harga', compact('data', 'tipe'));
  }

  /**
   * form tambah harga
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.harga', compact('tipe'));
  }


  /**
   * proses tambah harga
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiHarga::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiHarga::errors() );
    }

    // tambah harga
    $tambah = Harga::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'harga gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'harga sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah harga
   *
   * @param  int  $id
   * @return Response
   */
   
  public function edit($id)
  {
    // data
    $harga = Hargaku::set($id);
    $tipe     = 'rubah';

    return View::make('form.harga', compact('harga', 'tipe'));
  }

  /**
   * proses rubah harga
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiHarga::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiHarga::errors() );
    }

    // rubah harga
    $rubah = Harga::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'harga gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'harga sukses dirubah.');

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
    // hapus harga
    Hargaku::hapus($id);
  }

}