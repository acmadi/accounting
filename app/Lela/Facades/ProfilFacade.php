<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ProfilFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'profil';
  }

}