<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class PerusahaanFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'perusahaan';
  }

}