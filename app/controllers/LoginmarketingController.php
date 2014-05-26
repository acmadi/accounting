<?php

class LoginmarketingController extends BaseController {

	/**
	 * tampilkan form login
	 *
	 * @return View
	 */
	public function form()
	{
		return View::make('form.loginmarketing');
	}

	/**
	 * proses login marketing
	 * 
	 * @return Redirect
	 */
	public function proses()
	{
		// validasi gagal
		if (! ValidasiLoginmarketing::cek())
		{
      return Redirect::back()
        ->withInput()
        ->withErrors( ValidasiLoginmarketing::errors() );
		}

		// login gagal
		if (! Loginmarketing::cek())
		{
			return Redirect::back()
				->withInput()
				->withErrors( array('password' => 'Password tidak cocok.') );
		}

		// login sukses
		return Redirect::route('pengguna.index');
	}

}