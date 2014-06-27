<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPph42;

class ValidasiPph42Provider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_pph42', function()
    {
      return new ValidasiPph42;
    });
  }

}