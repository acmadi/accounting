<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPelanggan;

class ValidasiPelangganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_pelanggan', function()
    {
      return new ValidasiPelanggan;
    });
  }

}