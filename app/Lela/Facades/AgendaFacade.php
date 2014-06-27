<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class AgendaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'agenda';
  }

}