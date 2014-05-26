<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PelangganFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'pelanggan';
  }

}