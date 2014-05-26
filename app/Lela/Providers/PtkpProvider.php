<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Ptkp;

class PtkpProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('ptkp', function()
    {
      return new Ptkp;
    });
  }

}