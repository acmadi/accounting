<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiTunjangan;

class ValidasiTunjanganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_tunjangan', function()
    {
      return new ValidasiTunjangan;
    });
  }

}