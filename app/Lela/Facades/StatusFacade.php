<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class StatusFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'status';
  }

}