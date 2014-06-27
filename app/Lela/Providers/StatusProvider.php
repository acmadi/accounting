<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Status;

class StatusProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('status', function()
    {
      return new Status;
    });
  }

}