<?php

class KaryawanController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data faktur karyawan
   *
   * @return View
   */
  public function index()
  {
    // data semua karyawan
    $data = Karyawanku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.karyawan', compact('data', 'tipe'));
  }

  /**
   * proses cari karyawan
   * 
   * @return View
   */
  public function search()
  {
    // cari karyawan
    $data = Karyawan::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.karyawan', compact('data', 'tipe'));
  }

  /**
   * form tambah karyawan
   *
   * @return View
   */
  public function create()
  {
    $agama  		= Agamaku::semua();
    $departemen   	= Departemenme::semua();
	$jabatan	   	= Jabatanku::semua();
	$golongan   	= Golonganku::semua();
	$ptkp 		  	= Ptkpku::semua();
	
    $tipe     = 'buat';

    return View::make('form.karyawan', compact('agama', 'departemen', 'jabatan', 'golongan', 'ptkp', 'tipe'));
  }


  /**
   * proses tambah karyawan
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiKaryawan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiKaryawan::errors() );
    }
	
    // tambah karyawan
    $tambah = Karyawan::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Karyawan gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Karyawan sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah karyawan
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $karyawan 	= Karyawanku::set($id);
    $agama   	= Agamaku::semua();
    $departemen	= Departemenme::semua();
	$jabatan	= Jabatanku::semua();
	$golongan	= Golonganku::semua();
	$ptkp		= Ptkpku::semua();
	
    $tipe      	= 'rubah';

    return View::make('form.karyawan', compact('karyawan', 'agama', 'departemen', 'jabatan', 'golongan', 'ptkp', 'tipe'));
  }

  /**
   * proses rubah karyawan
   *
   * @param  int  $id
   * @return Response
   */
   
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiKaryawan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiKaryawan::errors() );
    }

    // rubah karyawan
    $rubah = Karyawan::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'karyawan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'karyawan sukses dirubah.');

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
    // hapus karyawan
    Karyawanku::hapus($id);
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
    $faktur = Karyawanku::semua();

    return View::make('pdf.karyawan', compact('corp', 'faktur'));
  }

}