<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Golongan;

class GolonganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('golongan', function()
    {
      return new Golongan;
    });
  }

}