<?php

class LogoutController extends BaseController {

  /**
   * konstruktor
   */
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * proses logout user
   * 
   * @return Redirect
   */
  public function proses()
  {
    // logout user
    Auth::logout();

    return Redirect::guest('login');
  }

}