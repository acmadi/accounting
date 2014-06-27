<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class GajiFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'gaji';
  }

}