<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Potongan;

class PotonganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('potongan', function()
    {
      return new Potongan;
    });
  }

}