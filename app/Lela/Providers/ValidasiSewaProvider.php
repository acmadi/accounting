<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiSewa;

class ValidasiSewaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_sewa', function()
    {
      return new ValidasiSewa;
    });
  }

}