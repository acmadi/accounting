<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Profil;

class ProfilProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('profil', function()
    {
      return new Profil;
    });
  }

}