<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Gaji;

class GajiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('gaji', function()
    {
      return new Gaji;
    });
  }

}