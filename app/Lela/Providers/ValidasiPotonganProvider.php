<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiPotongan;

class ValidasiPotonganProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_potongan', function()
    {
      return new ValidasiPotongan;
    });
  }

}