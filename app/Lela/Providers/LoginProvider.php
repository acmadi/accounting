<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Login;

class LoginProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('login', function()
    {
      return new Login;
    });
  }

}