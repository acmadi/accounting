<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiLembur;

class ValidasiLemburProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_lembur', function()
    {
      return new ValidasiLembur;
    });
  }

}