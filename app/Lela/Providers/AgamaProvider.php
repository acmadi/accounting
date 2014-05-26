<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Agama;

class AgamaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('agama', function()
    {
      return new Agama;
    });
  }

}