<?php

class Pph42Controller extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data pph42
   *
   * @return View
   */
  public function index()
  {
    // data semua pph42
    $data = Pph42ku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.pph42', compact('data', 'tipe'));
  }

  /**
   * proses cari pph42
   * 
   * @return View
   */
  public function search()
  {
    // cari pph42
    $data = Pph42::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.pph42', compact('data', 'tipe'));
  }

  /**
   * form tambah pph42
   *
   * @return View
   */
   
  public function create()
  {
    $perusahaan1  	= Perusahaan1ku::semua();
	
    $tipe     = 'buat';

    return View::make('form.pph42', compact('perusahaan1', 'tipe'));
  }


  /**
   * proses tambah pph42
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiPph42::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPph42::errors() );
    }

    // tambah pph42
    $tambah = Pph42::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'pph42 gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pph42 sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah pph42
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $perusahaan1  	= Perusahaan1ku::semua();

    $pph42			= Pph42ku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.pph42', compact('pph42', 'perusahaan1', 'tipe'));
  }

  /**
   * proses rubah perusahaan
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPph42::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPph42::errors() );
    }

    // rubah perusahaan1
    $rubah = Pph42::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'Pph42 gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Pph42 sukses dirubah.');

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
    // hapus pph42
    Pph42ku::hapus($id);
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
    $faktur = Pph42ku::semua();

    return View::make('pdf.pph42', compact('corp', 'faktur'));
  }

}