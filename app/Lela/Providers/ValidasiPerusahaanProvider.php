<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPerusahaan;

class ValidasiPerusahaanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_perusahaan', function()
    {
      return new ValidasiPerusahaan;
    });
  }

}