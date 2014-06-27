<?php

class LemburController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data lembur
   *
   * @return View
   */
  public function index()
  {
    // data semua lembur
    $data = Lemburku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.lembur', compact('data', 'tipe'));
  }

  /**
   * proses cari lembur
   * 
   * @return View
   */
  public function search()
  {
    // cari lembur
    $data = Lembur::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.lembur', compact('data', 'tipe'));
  }

  /**
   * form tambah lembur
   *
   * @return View
   */
  public function create()
  {
    $tunjangan  		= Tunjanganku::semua();

	
    $tipe     = 'buat';

    return View::make('form.lembur', compact('tunjangan', 'tipe'));
  }


  /**
   * proses tambah lembur
   *
   * @return Redirect
   */
   
  public function store()
  {
    // validasi gagal
    if (! ValidasiLembur::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiLembur::errors() );
    }

    // tambah lembur
    $tambah = Lembur::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Lembur gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Lembur sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah lembur
   *
   * @param  int  $id
   * @return Response
   */
   
  public function edit($id)
  {
    // data
    $lembur		= Lemburku::set($id);
	$tunjangan	= Tunjanganku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.lembur', compact('lembur', 'tunjangan', 'tipe'));
  }

  /**
   * proses rubah lembur 
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiLembur::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiLembur::errors() );
    }

    // rubah lembur
    $rubah = Lembur::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'lembur gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'lembur sukses dirubah.');

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
    // hapus lembur
    Lemburku::hapus($id);
  }

  
}