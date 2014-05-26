<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiGolongan;

class ValidasiGolonganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_golongan', function()
    {
      return new ValidasiGolongan;
    });
  }

}