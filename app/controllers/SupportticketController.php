<?php

class SupportticketController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data support ticket
   *
   * @return View
   */
  public function index()
  {
    // data semua support ticket
    $data = Supportticketku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.supportticket', compact('data', 'tipe'));
  }

  /**
   * proses cari support ticket
   * 
   * @return View
   */
  public function search()
  {
    // cari support ticket
    $data = Supportticket::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.supportticket', compact('data', 'tipe'));
  }

  /**
   * form tambah support ticket
   *
   * @return View
   */
  public function create()
  {
    $marketing  	= Marketingku::semua();
	
    $tipe     = 'buat';

    return View::make('form.supportticket', compact('marketing', 'tipe'));
  }


  /**
   * proses tambah support ticket
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiSupportticket::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiSupportticket::errors() );
    }

    // tambah support ticket
    $tambah = Supportticket::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'support ticket gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'support ticket sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah support ticket
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $marketing  		= Marketingku::semua();

    $supportticket		= Supportticketku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.supportticket', compact('supportticket', 'marketing', 'tipe'));
  }

  /**
   * proses rubah support ticket
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiSupportticket::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiSupportticket::errors() );
    }

    // rubah support ticket
    $rubah = Supportticket::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'support ticket gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'support ticket sukses dirubah.');

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
    // hapus support ticket
    Supportticketku::hapus($id);
  }

  /**
   * export ke pdf
   * 
   * @return 
   */
  public function pdf()
  {
    // data
    $corp   = Corp::data();
    $faktur = Supportticketku::semua();

    return View::make('pdf.supportticket', compact('corp', 'faktur'));
  }

}