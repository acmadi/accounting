<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiPkpFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_pkp';
  }

}