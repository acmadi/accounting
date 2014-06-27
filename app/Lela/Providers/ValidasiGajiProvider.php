<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiGaji;

class ValidasiGajiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_gaji', function()
    {
      return new ValidasiGaji;
    });
  }

}