<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Agenda;

class AgendaProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('agenda', function()
    {
      return new Agenda;
    });
  }

}