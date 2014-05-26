<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class JabatanFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'jabatan';
  }

}