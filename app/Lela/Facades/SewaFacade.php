<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class SewaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'sewa';
  }

}