<?php

class RegisterClientController extends \BaseController {

  /**
   * konstruktor
   */
   
   
  public function __construct()
  {
    $this->beforeFilter('auth');
  }

  /**
   * data register
   *
   * @return View
   */
   
  public function index()
  {
       $tipe = 'semua';
       
    return View::make('form.register',compact('tipe'));     
  }

}