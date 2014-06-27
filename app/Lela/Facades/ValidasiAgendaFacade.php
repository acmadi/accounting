<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class ValidasiAgendaFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'validasi_agenda';
  }

}