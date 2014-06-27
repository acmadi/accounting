<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Sewa;

class SewaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('sewa', function()
    {
      return new Sewa;
    });
  }

}