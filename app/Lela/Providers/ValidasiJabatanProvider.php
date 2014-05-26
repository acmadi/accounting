<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiJabatan;

class ValidasiJabatanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_jabatan', function()
    {
      return new ValidasiJabatan;
    });
  }

}