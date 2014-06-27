<?php

class PotonganController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data potongan
   *
   * @return View
   */
   
  public function index()
  {
    // data semua potongan
    $data = Potonganku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.potongan', compact('data', 'tipe'));
  }

  /**
   * proses cari potongan
   * 
   * @return View
   */
  public function search()
  {
    // cari potongan
    $data = Potongan::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.potongan', compact('data', 'tipe'));
  }

  /**
   * form tambah potongan
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.potongan', compact('tipe'));
  }


  /**
   * proses tambah potongan
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiPotongan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPotongan::errors() );
    }

    // tambah potongan
    $tambah = Potongan::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'potongan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'potongan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah potongan
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $potongan = Potonganku::set($id);
    $tipe     = 'rubah';

    return View::make('form.potongan', compact('potongan', 'tipe'));
  }

  /**
   * proses rubah potongan
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPotongan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPotongan::errors() );
    }

    // rubah potongan
    $rubah = Potongan::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'potongan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'potongan sukses dirubah.');

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
    // hapus potongan
    Potonganku::hapus($id);
  }

}