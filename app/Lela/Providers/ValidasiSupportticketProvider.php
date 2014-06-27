<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiSupportticket;

class ValidasiSupportticketProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_supportticket', function()
    {
      return new ValidasiSupportticket;
    });
  }

}