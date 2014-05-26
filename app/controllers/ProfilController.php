<?php

class ProfilController extends BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * tampilkan form rubah profil
   *
   * @return View
   */
  public function form()
  {
    return View::make('form.profil');
  }

  /**
   * proses rubah profil
   * 
   * @return json
   */
  public function proses()
  {
    // validasi gagal
    if (! ValidasiProfil::cek())
    {
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiProfil::errors() );
    }

    // ada foto
    if (Input::hasFile('foto'))
    {
      $id   = Auth::user()->id;
      $foto = Auth::user()->foto;
      $tipe = 'foto';
      $eks  = Input::file('foto')->getClientOriginalExtension();

      Foto::unggah($id, $foto, $tipe, $eks);
    }

    // rubah profil
    $rubah = Profil::rubah( Auth::user()->id );

    // gagal rubah
    if (! $rubah)
      $respon = array('status' => 'gagal', 'pesan' => 'Profil gagal dirubah.');

    // sukses rubah
    else
      $respon = array('status' => 'sukses', 'pesan' => 'Profil sukses dirubah.');

    return Redirect::back()
      ->withStatus( $respon['status'] )
      ->withPesan( $respon['pesan'] );
  }

}