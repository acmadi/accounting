<?php

class LoginController extends BaseController {

	/**
	 * tampilkan form login
	 *
	 * @return View
	 */
	public function form()
	{
		return View::make('form.login');
	}

	/**
	 * proses login
	 * 
	 * @return Redirect
	 */
	public function proses()
	{
		// validasi gagal
		if (! ValidasiLogin::cek())
		{
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiLogin::errors() );
		}

		// login gagal
		if (! Login::cek())
		{
			return Redirect::back()
				->withInput()
				->withErrors( array('password' => 'Password tidak cocok.') );
		}

		// login sukses
		return Redirect::route('pengguna.index');
	}

}