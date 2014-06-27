<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Supportticket;

class SupportticketProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('supportticket', function()
    {
      return new Supportticket;
    });
  }

}