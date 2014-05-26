<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Jabatan;

class JabatanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('jabatan', function()
    {
      return new Jabatan;
    });
  }

}