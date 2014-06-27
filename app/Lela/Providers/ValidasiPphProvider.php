<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPph;

class ValidasiPphProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_pph', function()
    {
      return new ValidasiPph;
    });
  }

}