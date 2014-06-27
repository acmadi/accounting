<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PphFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'pph';
  }

}