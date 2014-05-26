<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiDepartemen;

class ValidasiDepartemenProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_departemen', function()
    {
      return new ValidasiDepartemen;
    });
  }

}