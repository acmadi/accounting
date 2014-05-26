<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPengguna;

class ValidasiPenggunaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_pengguna', function()
    {
      return new ValidasiPengguna;
    });
  }

}