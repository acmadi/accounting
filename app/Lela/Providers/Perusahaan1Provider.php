<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Perusahaan1;

class Perusahaan1Provider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('perusahaan1', function()
    {
      return new Perusahaan1;
    });
  }

}