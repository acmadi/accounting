<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class DepartemenFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'departemen';
  }

}