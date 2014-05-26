<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Departemen;

class DepartemenProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('departemen', function()
    {
      return new Departemen;
    });
  }

}