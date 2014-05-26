<?php

class DepartemenController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data departemen
   *
   * @return View
   */
   
  public function index()
  {
    // data semua departemen
    $data = Departemenme::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.departemen', compact('data', 'tipe'));
  }

  /**
   * proses cari departemen
   * 
   * @return View
   */
  public function search()
  {
    // cari depatemen
    $data = Departemen::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.departemen', compact('data', 'tipe'));
  }

  /**
   * form tambah departemen
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.departemen', compact('tipe'));
  }


  /**
   * proses tambah departemen
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiDepartemen::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiDepartemen::errors() );
    }

    // tambah departemen
    $tambah = Departemen::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'departemen gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'departemen sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah departemen
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $departemen = Departemenme::set($id);
    $tipe     = 'rubah';

    return View::make('form.departemen', compact('departemen', 'tipe'));
  }

  /**
   * proses rubah departemen
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiDepartemen::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiDepartemen::errors() );
    }

    // rubah departemen
    $rubah = Departemen::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'departemen gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'departemen sukses dirubah.');

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
    // hapus departemen
    Departemenme::hapus($id);
  }

}