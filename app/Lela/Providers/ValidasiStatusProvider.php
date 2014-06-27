<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiStatus;

class ValidasiStatusProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_status', function()
    {
      return new ValidasiStatus;
    });
  }

}