<?php

class BarangController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data barang
   *
   * @return View
   */
  public function index()
  {
    // data semua barang
    $data = Barang::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.barang', compact('data', 'tipe'));
  }

  /**
   * proses cari barang
   * 
   * @return View
   */
  public function search()
  {
    // cari barang
    $data = Produk::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.barang', compact('data', 'tipe'));
  }

  /**
   * form tambah barang
   *
   * @return View
   */
  public function create()
  {
    $tipe = 'buat';

    return View::make('form.barang', compact('tipe'));
  }


  /**
   * proses tambah barang
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiBarang::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiBarang::errors() );
    }

	
    // tambah barang
    $tambah = Produk::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Barang gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Barang sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

  /**
   * form rubah barang
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $pemasukan = Barang::set($id);
    $tipe      = 'rubah';

    return View::make('form.barang', compact('pemasukan', 'tipe'));
  }

  /**
   * proses rubah barang
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiBarang::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiBarang::errors() );
    }

    // rubah barang
    $rubah = Produk::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'Barang gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Barang sukses dirubah.');

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
    // hapus barang
    Barang::hapus($id);
  }

  /**
   * export ke ms excel
   * 
   * @return 
   */
  public function excel()
  {
    // data
    $corp   = Corp::data();
    $barang = Barang::semua();

    return View::make('excel.barang', compact('corp', 'barang'));
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
    $barang = Barang::semua();

    return View::make('pdf.barang', compact('corp', 'barang'));
  }

}