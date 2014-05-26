<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class KaryawanFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'karyawan';
  }

}