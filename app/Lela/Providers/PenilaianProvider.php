<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Penilaian;

class PenilaianProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('penilaian', function()
    {
      return new Penilaian;
    });
  }

}