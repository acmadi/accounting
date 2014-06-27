<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Pkp;

class PkpProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('pkp', function()
    {
      return new Pkp;
    });
  }

}