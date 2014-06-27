<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPkp;

class ValidasiPkpProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_pkp', function()
    {
      return new ValidasiPkp;
    });
  }

}