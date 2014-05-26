<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class FotoFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'foto';
  }

}