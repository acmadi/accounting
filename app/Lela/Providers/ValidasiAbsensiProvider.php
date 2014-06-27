<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiAbsensi;

class ValidasiAbsensiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_absensi', function()
    {
      return new ValidasiAbsensi;
    });
  }

}