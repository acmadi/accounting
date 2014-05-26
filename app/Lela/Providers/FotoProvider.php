<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Foto;

class FotoProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('foto', function()
    {
      return new Foto;
    });
  }

}