<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ProdukFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'produk';
  }

}