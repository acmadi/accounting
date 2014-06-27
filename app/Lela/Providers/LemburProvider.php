<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Lembur;

class LemburProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('lembur', function()
    {
      return new Lembur;
    });
  }

}