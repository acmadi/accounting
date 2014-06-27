<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiAbsensiFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_absensi';
  }

}