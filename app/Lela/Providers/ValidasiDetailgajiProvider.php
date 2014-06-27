<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiDetailgaji;

class ValidasiDetailgajiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_detailgaji', function()
    {
      return new ValidasiDetailgaji;
    });
  }

}