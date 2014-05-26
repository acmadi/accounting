<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Karyawan;

class KaryawanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('karyawan', function()
    {
      return new Karyawan;
    });
  }

}