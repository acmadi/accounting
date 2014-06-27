<?php

class GuestController extends BaseController {

    /**
     * Layout yang akan digunakan untuk controller ini
     */
    protected $layout = 'layouts.guest';

    /**
     * Tampikan halaman root
     * @return response
     */
	
    public function index()
    {
        // Redirect to dashboard if user has logged in
        if (Sentry::check()) {
            return Redirect::to('dashboard');
        }
		
        $this->layout->content = View::make('guest.index')->withTitle("Daftar Buku");
    }

    /**
     * Tampilkan halaman login
     * @return response
     */
    public function login()
    {
        // redirect ke dashboard jika user sudah login
        if (Sentry::check()) {
            Session::reflash();
            return Redirect::to('dashboard');
        }

        $this->layout->content = View::make('guest.login');
    }

    /**
     * Tampilkan halaman signup
     * @return response
    */

    public function signup()
    {
        $this->layout->content = View::make('guest.signup');
    }

    /**
     * Register User dan kirim email untuk aktivasi
     * @return response
     */
	 
    public function register()
    {


        // Register User tanpa diaktivasi
        $users = Sentry::register(array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
            'nama_depan' => Input::get('nama_depan'),
            'nama_belakang' => Input::get('nama_belakang')
        ), false);



$data = [
            'email'=>$users->email,
            // Generate kode aktivasi
            
        ];


        // Kirim email aktivasi
        Mail::send('emails.auth.register', $data, function ($message) use ($users) {
            $message->to($users->email, $users->first_name . ' ' . $users->last_name)->subject('Aktivasi Akun Larapus');
        });

        // Redirect ke halaman login
        return Redirect::route('guest.login')->with("successMessage", "Silahkan cek email Anda ($users->email) untuk melakukan aktivasi akun.");
    }

    /**
     * Aktivasi seorang user
     * @param  string $activationCode
     * @return response
     */
	 
    public function activate()
    {
        $email = Input::get('email');
        $activationCode = Input::get('activationCode');

        try {
            $user = Sentry::findUserByLogin($email);
            $user->attemptActivation($activationCode);
        } catch (UserAlreadyActivatedException $e) {
            return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
        } catch (UserNotFoundException $e)  {
            return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
        }

        return Redirect::route('guest.login')
            ->with('successMessage', 'Akun Anda berhasil diaktivasi, silahkan login.');
    }

    /**
     * Tampilkan halaman lupa password
     * @return response
     */
    public function forgotPassword()
    {
        $this->layout->content = View::make('guest.forgot');
    }

    /**
     * Kirim email reset password
     * @return response
     */
    public function sendResetCode()
    {
        // Validasi email dan catcha
        $rules = array(
            'email' => 'required|exists:users',
            'recaptcha_response_field' => 'required|recaptcha'
        );

        $validator = Validator::make($data = Input::all(), $rules);

        // Redirect jika validasi gagal
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = Sentry::findUserByLogin(Input::get('email'));
        $data = array(
            'email' => $user->email,
            // Generate code untuk password reset
            'resetCode' => $user->getResetPasswordCode(),
        );

        // Kirim email untuk reset password
        Mail::send('emails.auth.reminder', $data, function ($message) use ($user) {
            $message->to($user->email, $user->first_name . ' ' . $user->last_name)->subject('Reset Password Larapus');
        });

        // Redirect ke halaman login
        return Redirect::route('guest.login')->with("successMessage", "Silahkan cek email Anda ($user->email) untuk me-reset password.");
    }

    /**
     * Tampilkan halaman untuk membuat password baru
     * @param  string $token
     * @return response
     */
    public function createNewPassword()
    {
        try {
            $user = Sentry::findUserByLogin(Input::get('email'));
            if($user->checkResetPasswordCode(Input::get('resetCode'))) {
                $this->layout->content = View::make('guest.resetpassword')
                    ->with('email', $user->email)
                    ->with('resetCode', Input::get('resetCode'));
            } else {
                return Redirect::back()->with('errorMessage', 'Reset code tidak valid.');
            }
        } catch (UserNotFoundException $e) {
            return Redirect::route('guest.login')->with('errorMessage', $e->getMessage());
        }
    }

    /**
     * Simpan password user yang baru
     * @param  string $token
     * @return response
     */
    public function storeNewPassword()
    {
        try
        {
            // Cari user berdasarkan email
            $user = Sentry::findUserByLogin(Input::get('email'));

            // Check apakah resetCode valid
            if ($user->checkResetPasswordCode(Input::get('resetCode')))
            {
                // Validasi password baru
                $rules = array('password' => 'confirmed|required|min:5');
                $validator = Validator::make($data = Input::all(), $rules);

                // Redirect jika validasi gagal
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

                // Reset password user
                $user->attemptResetPassword('8f1Z7wA4uVt7VemBpGSfaoI9mcjdEwtK8elCnQOb', Input::get('password'));

                return Redirect::route('guest.login')->with('successMessage', 'Berhasil me-reset password. Silahkan login dengan password baru.');
            }
            else
            {
                return Redirect::back()->with('errorMessage', 'Reset code tidak valid.');
            }
        }
        catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            return Redirect::back()->with('errorMessage', $e->getMessage());
        }
    }

}