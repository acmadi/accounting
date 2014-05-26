<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiKaryawanFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_karyawan';
  }

}
