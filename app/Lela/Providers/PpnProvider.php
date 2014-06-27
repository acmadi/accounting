<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Ppn;

class PpnProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('ppn', function()
    {
      return new Ppn;
    });
  }

}