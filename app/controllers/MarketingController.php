<?php

class MarketingController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data marketing
   *
   * @return View
   */
   
  public function index()
  {
    // data semua marketing
    $data = Marketingku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.marketing', compact('data', 'tipe'));
  }

  /**
   * proses cari marketing
   * 
   * @return View
   */
  public function search()
  {
    // cari marketing
    $data = Marketing::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.marketing', compact('data', 'tipe'));
  }

  /**
   * form tambah marketing
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.marketing', compact('tipe'));
  }


  /**
   * proses tambah marketing
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiMarketing::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiMarketing::errors() );
    }

    // tambah marketing
    $tambah = Marketing::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'marketing gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'marketing sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah marketing
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $marketing = Marketingku::set($id);
    $tipe     = 'rubah';

    return View::make('form.marketing', compact('marketing', 'tipe'));
  }

  /**
   * proses rubah marketing
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiMarketing::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiMarketing::errors() );
    }

    // rubah marketing
    $rubah = Marketing::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'marketing gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'marketing sukses dirubah.');

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
    // hapus marketing
    Marketingku::hapus($id);
  }

}