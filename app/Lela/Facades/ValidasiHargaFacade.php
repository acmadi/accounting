<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiHargaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_harga';
  }

}