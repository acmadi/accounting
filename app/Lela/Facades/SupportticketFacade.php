<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class SupportticketFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'supportticket';
  }

}