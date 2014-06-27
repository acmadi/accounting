<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PenilaianFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'penilaian';
  }

}