<?php namespace Lela\Providers;

use Illuminate\Support\ServiceProvider;
use Lela\Proses\Ticketreply;

class TicketreplyProvider extends ServiceProvider {

  public function register()
  {
    $this->app->bind('ticketreply', function()
    {
      return new Ticketreply;
    });
  }

}