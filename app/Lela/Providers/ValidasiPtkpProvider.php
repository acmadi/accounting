<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPtkp;

class ValidasiPtkpProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_ptkp', function()
    {
      return new ValidasiPtkp;
    });
  }

}