<?php namespace Lela\Facades;

use Illuminate\Support\Facades\Facade;

class MarketingFacade extends Facade {

  protected static function getFacadeAccessor()
  {
    return 'marketing';
  }

}