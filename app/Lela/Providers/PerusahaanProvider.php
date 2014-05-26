<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Perusahaan;

class PerusahaanProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('perusahaan', function()
    {
      return new Perusahaan;
    });
  }

}