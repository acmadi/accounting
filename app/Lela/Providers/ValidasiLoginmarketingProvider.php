<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiLoginmarketing;

class ValidasiLoginmarketingProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_loginmarketing', function()
    {
      return new ValidasiLoginmarketing;
    });
  }

}