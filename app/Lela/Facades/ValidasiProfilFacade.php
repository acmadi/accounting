<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiProfilFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_profil';
  }

}