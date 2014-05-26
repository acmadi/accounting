<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiLogin;

class ValidasiLoginProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_login', function()
    {
      return new ValidasiLogin;
    });
  }

}