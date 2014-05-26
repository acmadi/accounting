<?php

class PerusahaanController extends BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * tampilkan form rubah perusahaan
   *
   * @return View
   */
  public function form()
  {
    // data perusahaan
    $data = Corp::data();

    return View::make('form.perusahaan', compact('data'));
  }

  /**
   * proses rubah perusahaan
   * 
   * @return Redirect
   */
  public function proses()
  {
    // validasi gagal
    if (! ValidasiPerusahaan::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiPerusahaan::errors() );
    }

    // ada logo
    if (Input::hasFile('logo'))
    {
      // data perusahaan
      $data = Corp::data();

      // data logo
      $id   = $data->id;
      $foto = $data->logo;
      $tipe = 'logo';
      $eks  = Input::file('logo')->getClientOriginalExtension();

      Foto::unggah($id, $foto, $tipe, $eks);
    }

    // rubah perusahaan
    $rubah = Perusahaan::rubah(1);

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'Perusahaan gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Perusahaan sukses dirubah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

}