<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiPenilaianFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_penilaian';
  }

}