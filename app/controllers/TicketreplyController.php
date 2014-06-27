<?php

class TicketreplyController extends \BaseController {

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
    // data semua ticket reply
    $data = Ticketreplyku::data();

    // tipe
    $tipe = 'semua';

    return View::make('data.ticketreply', compact('data', 'tipe'));
  }

  /**
   * proses cari ticket reply
   * 
   * @return View
   */
  public function search()
  {
    // cari ticket reply
    $data = Ticketreply::cari();

    // tipe
    $tipe = 'cari';

    return View::make('data.ticketreply', compact('data', 'tipe'));
  }

  /**
   * form tambah ticket reply
   *
   * @return View
   */
   
  public function create()
  {
    $supportticket  	= Supportticketku::semua();
	
    $tipe     = 'buat';

    return View::make('form.ticketreply', compact('supportticket', 'tipe'));
  }


  /**
   * proses tambah ticket reply
   *
   * @return Redirect
   */
  public function store()
  {
    // validasi gagal
    if (! ValidasiTicketreply::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiTicketreply::errors() );
    }

    // tambah ticket reply
    $tambah = Ticketreply::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'ticket reply gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ticket reply sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }
  
  /**
   * form rubah ticket reply
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    // data
    $supportticket  		= Supportticketku::semua();

    $ticketreply		= Ticketreplyku::set($id);
	
    $tipe      	= 'rubah';

    return View::make('form.ticketreply', compact('ticketreply', 'supportticket', 'tipe'));
  }

  /**
   * proses rubah ticket reply
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    // validasi gagal
    if (! ValidasiTicketreply::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiTicketreply::errors() );
    }

    // rubah support ticket
    $rubah = Ticketreply::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'ticket reply gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'ticket reply sukses dirubah.');

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
    // hapus ticket reply
    Ticketreplyku::hapus($id);
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
    $faktur = Ticketreplyku::semua();

    return View::make('pdf.ticketreply', compact('corp', 'faktur'));
  }

}