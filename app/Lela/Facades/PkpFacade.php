<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PkpFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'pkp';
  }

}