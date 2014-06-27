<?php

class RegisterownerController extends \BaseController {

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


		
	$registerowner	= new Registerowner();
	$registerowner->nama_depan			= Input::get('nama_depan');
	$registerowner->nama_belakang		= Input::get('nama_belakang');
	$registerowner->username			= Input::get('username');
	$registerowner->password			= Hash::make(Input::get('password'));
	$registerowner->email				= Input::get('email');
	$registerowner->handphone			= Input::get('handphone');
	$registerowner->npwp				= Input::get('npwp');
	$registerowner->alamat				= Input::get('alamat');
	$registerowner->kota				= Input::get('kota');
	$registerowner->propinsi			= Input::get('propinsi');
	$registerowner->kode_pos			= Input::get('kode_pos');
	
	$registerowner->save();
	


        // Persiapkan activation code untuk dikirim ke email
        $data = [
			'nama_depan'=>$registerowner->nama_depan,
			'nama_belakang'=>$registerowner->nama_belakang,
            'email'=>$registerowner->email,
			'username'=>$registerowner->username,
			
            // Generate kode aktivasi
           
        ];

        // Kirim email aktivasi
        Mail::send('emails.auth.register', $data, function ($message) use ($registerowner) {
            $message->to($registerowner->email, $registerowner->nama_depan . ' ' . $registerowner->nama_belakang)->subject('Aktivasi Account Owner');
        });
	
	return Redirect::to('register')->with('pesan', 'Register berhasil!');
	
		
	}
	
	
	
    /**
     * Aktivasi seorang user
     * @param  string $activationCode
     * @return response
     */
	 
    public function activate()
    {
        $email = Input::get('email');
        

        try {
            $registerowner = Sentry::findUserByLogin($email);
            $registerowner->attemptActivation($activationCode);
        } catch (UserAlreadyActivatedException $e) {
            return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
        } catch (UserNotFoundException $e)  {
            return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
        }

        return Redirect::route('guest.login')
            ->with('successMessage', 'Akun Anda berhasil diaktivasi, silahkan login.');
    }	

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */



}