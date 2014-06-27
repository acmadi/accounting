<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Detailgaji;

class DetailgajiProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('detailgaji', function()
    {
      return new Detailgaji;
    });
  }

}