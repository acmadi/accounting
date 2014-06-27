<?php

class PphController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data pph
   *
   * @return View
   */
  public function index()
  {
    // data semua pph
    $data = Pphku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.pph', compact('data', 'tipe'));
  }

  /**
   * proses cari pph
   * 
   * @return View
   */
  public function search()
  {
    // cari pph
    $data = Pph::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.pph', compact('data', 'tipe'));
  }

  /**
   * form tambah pph
   *
   * @return View
   */
  public function create()
  {
    $pkp  		= Pkpku::semua();
    $lembur   	= Lemburku::semua();
	
    $tipe     = 'buat';

    return View::make('form.pph', compact('pkp', 'lembur', 'tipe'));
  }


  /**
   * proses tambah pph
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiPph::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPph::errors() );
    }

    // tambah pph
    $tambah = Pph::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Pph gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Pph sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah pph
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $pkp  		= Pkpku::semua();
    $lembur   	= Lemburku::semua();

    $pph		= Pphku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.pph', compact('pph', 'pkp', 'lembur', 'tipe'));
  }

  
  /**
   * proses rubah pph
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiPph::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPph::errors() );
    }

    // rubah pph
    $rubah = Pph::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'pph gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'pph sukses dirubah.');

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
    // hapus pph
    Pphku::hapus($id);
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
    $faktur = Pphku::semua();

    return View::make('pdf.pph', compact('corp', 'faktur'));
  }

}