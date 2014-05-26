<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiProfil;

class ValidasiProfilProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_profil', function()
    {
      return new ValidasiProfil;
    });
  }

}