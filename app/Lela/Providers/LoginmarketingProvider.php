<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Loginmarketing;

class LoginmarketingProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('loginmarketing', function()
    {
      return new Loginmarketing;
    });
  }

}