<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Harga;

class HargaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('harga', function()
    {
      return new Harga;
    });
  }

}