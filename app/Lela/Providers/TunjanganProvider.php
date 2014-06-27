<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Tunjangan;

class TunjanganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('tunjangan', function()
    {
      return new Tunjangan;
    });
  }

}