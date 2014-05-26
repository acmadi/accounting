<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiAgama;

class ValidasiAgamaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_agama', function()
    {
      return new ValidasiAgama;
    });
  }

}