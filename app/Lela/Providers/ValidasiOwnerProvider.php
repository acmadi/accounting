<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiOwner;

class ValidasiOwnerProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_owner', function()
    {
      return new ValidasiOwner;
    });
  }

}