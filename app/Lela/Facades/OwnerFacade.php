<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class OwnerFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'owner';
  }

}