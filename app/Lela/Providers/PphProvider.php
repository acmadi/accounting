<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Pph;

class PphProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('pph', function()
    {
      return new Pph;
    });
  }

}