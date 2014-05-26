<?php

class JabatanController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data jabatan
   *
   * @return View
   */
   
  public function index()
  {
    // data semua jabatan
    $data = Jabatanku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.jabatan', compact('data', 'tipe'));
  }

  /**
   * proses cari jabatan
   * 
   * @return View
   */
  public function search()
  {
    // cari jabatan
    $data = Jabatan::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.jabatan', compact('data', 'tipe'));
  }

  /**
   * form tambah jabatan
   *
   * @return View
   */
  public function create()
  {
    $tipe    = 'buat';

    return View::make('form.jabatan', compact('tipe'));
  }


  /**
   * proses tambah jabatan
   *
   * @return Redirect
   */

  public function store()
  {
    // validasi gagal
    if (! ValidasiJabatan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiJabatan::errors() );
    }

    // tambah jabatan
    $tambah = Jabatan::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'jabatan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'jabatan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah jabatan
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $jabatan = Jabatanku::set($id);
    $tipe     = 'rubah';

    return View::make('form.jabatan', compact('jabatan', 'tipe'));
  }

  /**
   * proses rubah jabatan
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiJabatan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiJabatan::errors() );
    }

    // rubah jabatan
    $rubah = Jabatan::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'jabatan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'jabatan sukses dirubah.');

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
    // hapus jabatan
    Jabatanku::hapus($id);
  }

}