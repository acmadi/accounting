<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Pelanggan;

class PelangganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('pelanggan', function()
    {
      return new Pelanggan;
    });
  }

}