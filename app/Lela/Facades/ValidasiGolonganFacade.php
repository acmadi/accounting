<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiGolonganFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_golongan';
  }

}