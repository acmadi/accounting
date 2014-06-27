<?php

class AgendaController extends \BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data ticket reply
   *
   * @return View
   */
  public function index()
  {
    // data semua agenda
    $data = Agendaku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.agenda', compact('data', 'tipe'));
  }

  /**
   * proses cari agenda
   * 
   * @return View
   */
  public function search()
  {
    // cari agenda
    $data = Agenda::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.agenda', compact('data', 'tipe'));
  }

  /**
   * form tambah agenda
   *
   * @return View
   */
   
  public function create()
  {
    $marketing  	= Marketingku::semua();
	
    $tipe     = 'buat';

    return View::make('form.agenda', compact('marketing', 'tipe'));
  }


  /**
   * proses tambah agenda
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiAgenda::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAgenda::errors() );
    }

    // tambah agenda
    $tambah = Agenda::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'agenda gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'agenda sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah agenda
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $marketing  	= Marketingku::semua();

    $agenda		= Agendaku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.agenda', compact('agenda', 'marketing', 'tipe'));
  }

  /**
   * proses rubah agenda
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiAgenda::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiAgenda::errors() );
    }

    // rubah marketing
    $rubah = Agenda::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'agenda gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'agenda sukses dirubah.');

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
    // hapus agenda
    Agendaku::hapus($id);
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
    $faktur = Agendaku::semua();

    return View::make('pdf.agenda', compact('corp', 'faktur'));
  }

}