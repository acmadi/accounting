<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiPerusahaanFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_perusahaan';
  }

}