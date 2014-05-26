<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiOwnerFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_owner';
  }

}