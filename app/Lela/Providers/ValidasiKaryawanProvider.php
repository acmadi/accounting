<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiKaryawan;

class ValidasiKaryawanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_karyawan', function()
    {
      return new ValidasiKaryawan;
    });
  }

}