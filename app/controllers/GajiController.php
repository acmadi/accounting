<?php

class GajiController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data gaji
   *
   * @return View
   */
  public function index()
  {
    // data semua pph
    $data = Gajiku::data();

    // tipe
	
    $tipe = 'semua';

    return View::make('data.gaji', compact('data', 'tipe'));
  }

  /**
   * proses cari gaji
   * 
   * @return View
   */
   
  public function search()
  {
    // cari gaji
    $data = Gaji::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.gaji', compact('data', 'tipe'));
  }

  /**
   * form tambah gaji
   *
   * @return View
   */
   
  public function create()
  {
    $tunjangan	= Tunjanganku::semua();
    $lembur   	= Lemburku::semua();
    $pph   		= Pphku::semua();
	
    $tipe     = 'buat';

    return View::make('form.gaji', compact('tunjangan', 'lembur', 'pph', 'tipe'));
  }


  /**
   * proses tambah gaji
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiGaji::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiGaji::errors() );
    }

    // tambah pph
    $tambah = Gaji::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'gaji gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'gaji sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah gaji
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $tunjangan	= Tunjanganku::semua();
    $lembur   	= Lemburku::semua();
    $pph   		= Pphku::semua();

    $gaji		= Gajiku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.gaji', compact('gaji', 'tunjangan', 'lembur', 'pph', 'tipe'));
  }

  /**
   * proses rubah gaji
   *
   * @param  int  $id
   * @return Response
   */
   
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiGaji::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiGaji::errors() );
    }

    // rubah gaji
    $rubah = Gaji::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'gaji gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'gaji sukses dirubah.');

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
    // hapus gaji
    Gajiku::hapus($id);
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
    $faktur = Gajiku::semua();

    return View::make('pdf.gaji', compact('corp', 'faktur'));
  }

}