<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PpnFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'ppn';
  }

}