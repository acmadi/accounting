<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Absensi;

class AbsensiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('absensi', function()
    {
      return new Absensi;
    });
  }

}