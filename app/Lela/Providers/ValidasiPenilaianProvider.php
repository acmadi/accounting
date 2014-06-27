<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPenilaian;

class ValidasiPenilaianProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_penilaian', function()
    {
      return new ValidasiPenilaian;
    });
  }

}