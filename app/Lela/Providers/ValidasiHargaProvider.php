<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiHarga;

class ValidasiHargaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_harga', function()
    {
      return new ValidasiHarga;
    });
  }

}