<?php

class PemasokController extends BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

	/**
	 * data pemasok
	 *
	 * @return View
	 */
	public function index()
	{
		// data semua pemasok
		$data = Supplier::data();

		// tipe
		$tipe = 'semua';

		return View::make('data.pemasok', compact('data', 'tipe'));
	}

	/**
	 * proses cari pemasok
	 * 
	 * @return View
	 */
	public function search()
	{
		// cari pemasok
		$data = Pemasok::cari();

		// tipe
		$tipe = 'cari';

		return View::make('data.pemasok', compact('data', 'tipe'));
	}

  /**
   * form tambah pemasok
   *
   * @return View
   */
  public function create()
  {
    $tipe = 'buat';

    return View::make('form.pemasok', compact('tipe'));
  }


	/**
	 * proses tambah pemasok
	 *
	 * @return Redirect
	 */
	public function store()
	{
    // validasi gagal
    if (! ValidasiPemasok::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPemasok::errors() );
    }

    // tambah pemasok
    $tambah = Pemasok::tambah();

    // gagal tambah
    if (! $tambah)
      $respon = array('status' => 'gagal', 'pesan' => 'Pemasok gagal ditambah.');

    // sukses tambah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Pemasok sukses ditambah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
	}

	/**
	 * form rubah pemasok
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// data
		$supplier = Supplier::set($id);
		$tipe     = 'rubah';

		return View::make('form.pemasok', compact('supplier', 'tipe'));
	}

	/**
	 * proses rubah pemasok
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    // validasi gagal
    if (! ValidasiPemasok::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPemasok::errors() );
    }

    // rubah pemasok
    $rubah = Pemasok::rubah($id);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'Pemasok gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Pemasok sukses dirubah.');

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
		// hapus pemasok
		Supplier::hapus($id);
	}

	/**
	 * export ke ms excel
	 * 
	 * @return 
	 */
	public function excel()
	{
		// data
		$corp     = Corp::data();
		$supplier = Supplier::semua();

		return View::make('excel.pemasok', compact('corp', 'supplier'));
	}

	/**
	 * export ke pdf
	 * 
	 * @return 
	 */
	public function pdf()
	{
		// data
		$corp     = Corp::data();
		$supplier = Supplier::semua();

    return View::make('pdf.pemasok', compact('corp', 'supplier'));
	}

}