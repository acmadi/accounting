<?php

class OwnerController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data owner
   *
   * @return View
   */
  public function index()
  {
    // data semua owner
    $data = Ownerku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.owner', compact('data', 'tipe'));
  }

  /**
   * proses cari owner
   * 
   * @return View
   */
   
  public function search()
  {
    // cari owner
    $data = Owner::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.owner', compact('data', 'tipe'));
  }

  /**
   * form tambah owner
   *
   * @return View
   */
  public function create()
  {
    $karyawan  		= Karyawanku::semua();
    $perusahaan1   	= Perusahaan1ku::semua();
	$marketing	   	= Marketingku::semua();
	$status		   	= Statusku::semua();
	
    $tipe     = 'buat';

    return View::make('form.owner', compact('karyawan', 'perusahaan1', 'marketing', 'status', 'tipe'));
  }


  /**
   * proses tambah marketing
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiOwner::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiOwner::errors() );
    }

    // tambah owner
    $tambah = Owner::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Owner gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Owner sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah owner
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $owner 			= Ownerku::set($id);
    $karyawan  		= Karyawanku::semua();
    $perusahaan1   	= Perusahaan1ku::semua();
	$marketing	   	= Marketingku::semua();
	$status		   	= Statusku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.owner', compact('owner', 'karyawan', 'perusahaan1', 'marketing', 'status', 'tipe'));
  }

  /**
   * proses rubah owner
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiOwner::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiOwner::errors() );
    }

    // rubah owner
    $rubah = Owner::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'owner gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'owner sukses dirubah.');

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
    // hapus owner
    Ownerku::hapus($id);
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
    $faktur = Ownerku::semua();

    return View::make('pdf.owner', compact('corp', 'faktur'));
  }

}