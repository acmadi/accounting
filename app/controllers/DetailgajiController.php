<?php

class DetailgajiController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data detailgaji
   *
   * @return View
   */
  public function index()
  {
    // data semua detailgaji
    $data = Detailgajiku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.detailgaji', compact('data', 'tipe'));
  }

  /**
   * proses cari detailgaji
   * 
   * @return View
   */
  public function search()
  {
    // cari detailgaji
    $data = Detailgaji::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.detailgaji', compact('data', 'tipe'));
  }

  /**
   * form tambah deetailgaji
   *
   * @return View
   */
  public function create()
  {
    $potongan  		= Potonganku::semua();
	
    $tipe     = 'buat';

    return View::make('form.detailgaji', compact('potongan', 'tipe'));
  }


  /**
   * proses tambah detailgaji
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiDetailgaji::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiDetailgaji::errors() );
    }

    // tambah detailgaji
    $tambah = Detailgaji::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Detailgaji gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Detailgaji sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah detailgaji
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $detailgaji		= Detailgajiku::set($id);
	$potongan  		= Potonganku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.detailgaji', compact('detailgaji', 'potongan', 'tipe'));
  }

  /**
   * proses rubah detailgaji
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiDetailgaji::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiDetailgaji::errors() );
    }

    // rubah detailgaji
    $rubah = Detailgaji::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'detail gaji gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'detail gaji sukses dirubah.');

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
    // hapus detail gaji
    Detailgajiku::hapus($id);
  }

  
  

}