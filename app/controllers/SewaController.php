<?php

class SewaController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data sewa
   *
   * @return View
   */
  public function index()
  {
    // data semua sewa
    $data = Sewaku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.sewa', compact('data', 'tipe'));
  }

  /**
   * proses cari sewa
   * 
   * @return View
   */
  public function search()
  {
    // cari sewa
    $data = Sewa::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.sewa', compact('data', 'tipe'));
  }

  /**
   * form tambah sewa
   *
   * @return View
   */
   
  public function create()
  {
    $harga  	= Hargaku::semua();
	
    $tipe     = 'buat';

    return View::make('form.sewa', compact('harga', 'tipe'));
  }


  /**
   * proses tambah sewa
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiSewa::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiSewa::errors() );
    }

    // tambah sewa
    $tambah = Sewa::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'sewa gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'sewa sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah sewa
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $harga  	= Hargaku::semua();

    $sewa		= Sewaku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.sewa', compact('sewa', 'harga', 'tipe'));
  }

  /**
   * proses rubah sewa
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiSewa::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiSewa::errors() );
    }

    // rubah sewa
    $rubah = Sewa::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'sewa gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'sewa sukses dirubah.');

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
    // hapus sewa
    Sewaku::hapus($id);
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
    $faktur = Sewaku::semua();

    return View::make('pdf.sewa', compact('corp', 'faktur'));
  }

}
