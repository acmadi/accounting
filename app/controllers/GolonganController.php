<?php

class GolonganController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data golongan
   *
   * @return View
   */
   
  public function index()
  {
    // data semua golongan
    $data = Golonganku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.golongan', compact('data', 'tipe'));
  }

  /**
   * proses cari golongan
   * 
   * @return View
   */
  public function search()
  {
    // cari golongan
    $data = Golongan::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.golongan', compact('data', 'tipe'));
  }

  /**
   * form tambah golongan
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.golongan', compact('tipe'));
  }


  /**
   * proses tambah golongan
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiGolongan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiGolongan::errors() );
    }

    // tambah golongan
    $tambah = Golongan::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'golongan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'golongan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah golongan
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $golongan = Golonganku::set($id);
    $tipe     = 'rubah';

    return View::make('form.golongan', compact('golongan', 'tipe'));
  }

  /**
   * proses rubah golongan
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiGolongan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiGolongan::errors() );
    }

    // rubah golongan
    $rubah = Golongan::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'golongan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'golongan sukses dirubah.');

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
    // hapus golongan
    Golonganku::hapus($id);
  }

}