<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class HargaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'harga';
  }

}