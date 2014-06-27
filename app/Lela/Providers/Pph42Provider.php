<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Pph42;

class Pph42Provider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('pph42', function()
    {
      return new Pph42;
    });
  }

}