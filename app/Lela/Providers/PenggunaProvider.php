<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Pengguna;

class PenggunaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('pengguna', function()
    {
      return new Pengguna;
    });
  }

}