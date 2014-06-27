<?php

class PpnController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data ppn
   *
   * @return View
   */
  public function index()
  {
    // data semua ppn
    $data = Ppnku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.ppn', compact('data', 'tipe'));
  }

  /**
   * proses cari ppn
   * 
   * @return View
   */
  public function search()
  {
    // cari ppn
    $data = Ppn::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.ppn', compact('data', 'tipe'));
  }

  /**
   * form tambah ppn
   *
   * @return View
   */
   
  public function create()
  {
    $perusahaan1  	= Perusahaan1ku::semua();
	
    $tipe     = 'buat';

    return View::make('form.ppn', compact('perusahaan1', 'tipe'));
  }


  /**
   * proses tambah ppn
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiPpn::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPpn::errors() );
    }

    // tambah ppn
    $tambah = Ppn::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'ppn gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ppn sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah ppn
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $perusahaan1  	= Perusahaan1ku::semua();

    $ppn		= Ppnku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.ppn', compact('ppn', 'perusahaan1', 'tipe'));
  }

  /**
   * proses rubah ppn
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPpn::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPpn::errors() );
    }

    // rubah ppn
    $rubah = Ppn::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'ppn gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ppn sukses dirubah.');

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
    // hapus ppn
    Ppnku::hapus($id);
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
    $faktur = Ppnku::semua();

    return View::make('pdf.ppn', compact('corp', 'faktur'));
  }

}