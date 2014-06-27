<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class LemburFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'lembur';
  }

}