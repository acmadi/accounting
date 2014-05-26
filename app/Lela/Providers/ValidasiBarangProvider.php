<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiBarang;

class ValidasiBarangProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_barang', function()
    {
      return new ValidasiBarang;
    });
  }

}