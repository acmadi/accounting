<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Owner;

class OwnerProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('owner', function()
    {
      return new Owner;
    });
  }

}