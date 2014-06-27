<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Validasi\ValidasiTicketreply;

class ValidasiTicketreplyProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('validasi_ticketreply', function()
    {
      return new ValidasiTicketreply;
    });
  }

}