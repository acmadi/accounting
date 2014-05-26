<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPerusahaan1;

class ValidasiPerusahaan1Provider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_perusahaan1', function()
    {
      return new ValidasiPerusahaan1;
    });
  }

}