<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class SisaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'sisa';
  }

}