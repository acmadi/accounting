<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Application Debug Mode
	|--------------------------------------------------------------------------
	|
	| When your application is in debug mode, detailed error messages with
	| stack traces will be shown on every error that occurs within your
	| application. If disabled, a simple generic error page is shown.
	|
	*/

	'debug' => true,

	/*
	|--------------------------------------------------------------------------
	| Application URL
	|--------------------------------------------------------------------------
	|
	| This URL is used by the console to properly generate URLs when using
	| the Artisan command line tool. You should set this to the root of
	| your application so that it is used when running Artisan tasks.
	|
	*/

	'url' => 'http://localhost/lela/public',

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| Here you may specify the default timezone for your application, which
	| will be used by the PHP date and date-time functions. We have gone
	| ahead and set this to a sensible default for you out of the box.
	|
	*/

	'timezone' => 'Asia/Jakarta',

	/*
	|--------------------------------------------------------------------------
	| Application Locale Configuration
	|--------------------------------------------------------------------------
	|
	| The application locale determines the default locale that will be used
	| by the translation service provider. You are free to set this value
	| to any of the locales which will be supported by the application.
	|
	*/

	'locale' => 'id',

	/*
	|--------------------------------------------------------------------------
	| Encryption Key
	|--------------------------------------------------------------------------
	|
	| This key is used by the Illuminate encrypter service and should be set
	| to a random, 32 character string, otherwise these encrypted strings
	| will not be safe. Please do this before deploying an application!
	|
	*/

	'key' => 'E5TBsNeMtMs0PiZmqfvCwfvQAz4lkoKN',

	/*
	|--------------------------------------------------------------------------
	| Autoloaded Service Providers
	|--------------------------------------------------------------------------
	|
	| The service providers listed here will be automatically loaded on the
	| request to your application. Feel free to add your own services to
	| this array to grant expanded functionality to your applications.
	|
	*/

	'providers' => array(

		'Illuminate\Foundation\Providers\ArtisanServiceProvider',
		'Illuminate\Auth\AuthServiceProvider',
		'Illuminate\Cache\CacheServiceProvider',
		'Illuminate\Session\CommandsServiceProvider',
		'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
		'Illuminate\Routing\ControllerServiceProvider',
		'Illuminate\Cookie\CookieServiceProvider',
		'Illuminate\Database\DatabaseServiceProvider',
		'Illuminate\Encryption\EncryptionServiceProvider',
		'Illuminate\Filesystem\FilesystemServiceProvider',
		'Illuminate\Hashing\HashServiceProvider',
		'Illuminate\Html\HtmlServiceProvider',
		'Illuminate\Log\LogServiceProvider',
		'Illuminate\Mail\MailServiceProvider',
		'Illuminate\Database\MigrationServiceProvider',
		'Illuminate\Pagination\PaginationServiceProvider',
		'Illuminate\Queue\QueueServiceProvider',
		'Illuminate\Redis\RedisServiceProvider',
		'Illuminate\Remote\RemoteServiceProvider',
		'Illuminate\Auth\Reminders\ReminderServiceProvider',
		'Illuminate\Database\SeedServiceProvider',
		'Illuminate\Session\SessionServiceProvider',
		'Illuminate\Translation\TranslationServiceProvider',
		'Illuminate\Validation\ValidationServiceProvider',
		'Illuminate\View\ViewServiceProvider',
		'Illuminate\Workbench\WorkbenchServiceProvider',

		// validasi
		'Lela\Providers\ValidasiLoginProvider',
		'Lela\Providers\ValidasiLoginmarketingProvider',
		'Lela\Providers\ValidasiPenggunaProvider',
		'Lela\Providers\ValidasiAgamaProvider',
		'Lela\Providers\ValidasiDepartemenProvider',
		'Lela\Providers\ValidasiJabatanProvider',
		'Lela\Providers\ValidasiGolonganProvider',
		'Lela\Providers\ValidasiPtkpProvider',
		'Lela\Providers\ValidasiKaryawanProvider',
		'Lela\Providers\ValidasiOwnerProvider',		
		'Lela\Providers\ValidasiPerusahaan1Provider',
		'Lela\Providers\ValidasiMarketingProvider',	
		'Lela\Providers\ValidasiPerusahaanProvider',
		'Lela\Providers\ValidasiProfilProvider',

		// proses
		'Lela\Providers\LoginProvider',
		'Lela\Providers\LoginmarketingProvider',
		'Lela\Providers\PenggunaProvider',
		'Lela\Providers\AgamaProvider',
		'Lela\Providers\DepartemenProvider',
		'Lela\Providers\JabatanProvider',
		'Lela\Providers\GolonganProvider',
		'Lela\Providers\PtkpProvider',
		'Lela\Providers\KaryawanProvider',
		'Lela\Providers\OwnerProvider',		
		'Lela\Providers\Perusahaan1Provider',
		'Lela\Providers\MarketingProvider',
		'Lela\Providers\ProfilProvider',
		'Lela\Providers\FotoProvider',
		'Lela\Providers\PerusahaanProvider',

		// libraries
		'Barryvdh\DomPDF\ServiceProvider',

	),

	/*
	|--------------------------------------------------------------------------
	| Service Provider Manifest
	|--------------------------------------------------------------------------
	|
	| The service provider manifest is used by Laravel to lazy load service
	| providers which are not needed for each request, as well to keep a
	| list of all of the services. Here, you may set its storage spot.
	|
	*/

	'manifest' => storage_path().'/meta',

	/*
	|--------------------------------------------------------------------------
	| Class Aliases
	|--------------------------------------------------------------------------
	|
	| This array of class aliases will be registered when this application
	| is started. However, feel free to register as many as you wish as
	| the aliases are "lazy" loaded so they don't hinder performance.
	|
	*/

	'aliases' => array(

		'App'             => 'Illuminate\Support\Facades\App',
		'Artisan'         => 'Illuminate\Support\Facades\Artisan',
		'Auth'            => 'Illuminate\Support\Facades\Auth',
		'Blade'           => 'Illuminate\Support\Facades\Blade',
		'Cache'           => 'Illuminate\Support\Facades\Cache',
		'ClassLoader'     => 'Illuminate\Support\ClassLoader',
		'Config'          => 'Illuminate\Support\Facades\Config',
		'Controller'      => 'Illuminate\Routing\Controller',
		'Cookie'          => 'Illuminate\Support\Facades\Cookie',
		'Crypt'           => 'Illuminate\Support\Facades\Crypt',
		'DB'              => 'Illuminate\Support\Facades\DB',
		'Eloquent'        => 'Illuminate\Database\Eloquent\Model',
		'Event'           => 'Illuminate\Support\Facades\Event',
		'File'            => 'Illuminate\Support\Facades\File',
		'Form'            => 'Illuminate\Support\Facades\Form',
		'Hash'            => 'Illuminate\Support\Facades\Hash',
		'HTML'            => 'Illuminate\Support\Facades\HTML',
		'Input'           => 'Illuminate\Support\Facades\Input',
		'Lang'            => 'Illuminate\Support\Facades\Lang',
		'Log'             => 'Illuminate\Support\Facades\Log',
		'Mail'            => 'Illuminate\Support\Facades\Mail',
		'Paginator'       => 'Illuminate\Support\Facades\Paginator',
		'Password'        => 'Illuminate\Support\Facades\Password',
		'Queue'           => 'Illuminate\Support\Facades\Queue',
		'Redirect'        => 'Illuminate\Support\Facades\Redirect',
		'Redis'           => 'Illuminate\Support\Facades\Redis',
		'Request'         => 'Illuminate\Support\Facades\Request',
		'Response'        => 'Illuminate\Support\Facades\Response',
		'Route'           => 'Illuminate\Support\Facades\Route',
		'Schema'          => 'Illuminate\Support\Facades\Schema',
		'Seeder'          => 'Illuminate\Database\Seeder',
		'Session'         => 'Illuminate\Support\Facades\Session',
		'SSH'             => 'Illuminate\Support\Facades\SSH',
		'Str'             => 'Illuminate\Support\Str',
		'URL'             => 'Illuminate\Support\Facades\URL',
		'Validator'       => 'Illuminate\Support\Facades\Validator',
		'View'            => 'Illuminate\Support\Facades\View',

		// validasi
		'ValidasiLogin'				    => 'Lela\Facades\ValidasiLoginFacade',
		'ValidasiLoginmarketing'	    => 'Lela\Facades\ValidasiLoginmarketingFacade',
		'ValidasiPengguna'			    => 'Lela\Facades\ValidasiPenggunaFacade',
		'ValidasiAgama'			        => 'Lela\Facades\ValidasiAgamaFacade',
		'ValidasiDepartemen'	        => 'Lela\Facades\ValidasiDepartemenFacade',
		'ValidasiJabatan'				=> 'Lela\Facades\ValidasiJabatanFacade',
		'ValidasiGolongan'				=> 'Lela\Facades\ValidasiGolonganFacade',
		'ValidasiPtkp'					=> 'Lela\Facades\ValidasiPtkpFacade',
		'ValidasiKaryawan'				=> 'Lela\Facades\ValidasiKaryawanFacade',
		'ValidasiOwner'					=> 'Lela\Facades\ValidasiOwnerFacade',		
		'ValidasiPerusahaan1'			=> 'Lela\Facades\ValidasiPerusahaan1Facade',
		'ValidasiMarketing'				=> 'Lela\Facades\ValidasiMarketingFacade',
		'ValidasiPerusahaan'	        => 'Lela\Facades\ValidasiPerusahaanFacade',
		'ValidasiPemasok'	            => 'Lela\Facades\ValidasiPemasokFacade',
		'ValidasiPelanggan'             => 'Lela\Facades\ValidasiPelangganFacade',
		'ValidasiBarang'                => 'Lela\Facades\ValidasiBarangFacade',
		'ValidasiPembelian'	            => 'Lela\Facades\ValidasiPembelianFacade',
		'ValidasiPenjualan'	            => 'Lela\Facades\ValidasiPenjualanFacade',
		'ValidasiPemasukan'	            => 'Lela\Facades\ValidasiPemasukanFacade',
		'ValidasiPengeluaran'	        => 'Lela\Facades\ValidasiPengeluaranFacade',
		'ValidasiProfil'	  		    => 'Lela\Facades\ValidasiProfilFacade',

		// proses
		'Login'                         => 'Lela\Facades\LoginFacade',
		'Loginmarketing'                         => 'Lela\Facades\LoginmarketingFacade',
		'Pengguna'                      => 'Lela\Facades\PenggunaFacade',
		'Agama'                      	=> 'Lela\Facades\AgamaFacade',
		'Departemen'                   	=> 'Lela\Facades\DepartemenFacade',
		'Jabatan'	                    => 'Lela\Facades\JabatanFacade',
		'Golongan'	                    => 'Lela\Facades\GolonganFacade',
		'Ptkp'		                    => 'Lela\Facades\PtkpFacade',
		'Karyawan'	                    => 'Lela\Facades\KaryawanFacade',
		'Owner'		                    => 'Lela\Facades\OwnerFacade',		
		'Perusahaan1'		            => 'Lela\Facades\Perusahaan1Facade',
		'Marketing'		          		=> 'Lela\Facades\MarketingFacade',
		'Pemasok'                       => 'Lela\Facades\PemasokFacade',
		'Pelanggan'                     => 'Lela\Facades\PelangganFacade',
		'Produk'                        => 'Lela\Facades\ProdukFacade',
		'Profil'                        => 'Lela\Facades\ProfilFacade',
		'Foto'                          => 'Lela\Facades\FotoFacade',
		'Perusahaan'                    => 'Lela\Facades\PerusahaanFacade',
		'Pembelian'                     => 'Lela\Facades\PembelianFacade',
		'Penjualan'                     => 'Lela\Facades\PenjualanFacade',
		'Pemasukan'                     => 'Lela\Facades\PemasukanFacade',
		'Pengeluaran'                   => 'Lela\Facades\PengeluaranFacade',
		'Sisa'                          => 'Lela\Facades\SisaFacade',

		// libraries
		'PDF'                           => 'Barryvdh\DomPDF\Facade',

	),

);
