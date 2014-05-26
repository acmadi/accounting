<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
public function register() 
{
 return View::make('register'); 
}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = new User();

		$user->email = Input::get('email');
		$user->username  = Input::get('username');
		$user->password  = Hash::make(Input::get('password'));
				
		$user->save();

		Mail::send('mails.welcome', array('firstname'=>Input::get('username')), function($message){
			$message->to(Input::get('email'), Input::get('username').' '.Input::get('password'))->subject('Welcome to the Laravel 4 Auth App!');
		});
				
		return Redirect::to('register');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}