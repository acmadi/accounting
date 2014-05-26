<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiMarketing;

class ValidasiMarketingProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_marketing', function()
    {
      return new ValidasiMarketing;
    });
  }

}