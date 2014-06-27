<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiAgenda;

class ValidasiAgendaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_agenda', function()
    {
      return new ValidasiAgenda;
    });
  }

}