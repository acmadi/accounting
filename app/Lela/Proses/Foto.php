<?php namespace Lela\Proses;

class Foto {

  /**
   * proses unggah foto
   * 
   * @param  int    $id   id user/perusahaan
   * @param  file   $foto file foto/logo
   * @param  string $tipe tipe foto/logo
   * @param  string $eks  ekstensi foto/logo
   * @return void
   */
  public function unggah($id, $foto, $tipe, $eks)
  {
    // nama file
    $nama = $tipe.'_'.date('dmYHis').'.'.$eks;

    // jika user/perusahaan mempunyai foto maka hapus foto yang dulu
    if ($foto) unlink(public_path().'/foto/'.$foto);

    // unggah foto ke folder "public/foto"
    \Input::file($tipe)->move('foto', $nama);

    // foto
    if ($tipe == 'foto')
      \User::rubahFoto($id, $nama);
    // logo
    else
      \Corp::rubahLogo(1, $nama);
  }

}