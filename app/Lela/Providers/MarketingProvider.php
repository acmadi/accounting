<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Marketing;

class MarketingProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('marketing', function()
    {
      return new Marketing;
    });
  }

}