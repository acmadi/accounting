<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class GolonganFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'golongan';
  }

}