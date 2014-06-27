<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPpn;

class ValidasiPpnProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_ppn', function()
    {
      return new ValidasiPpn;
    });
  }

}