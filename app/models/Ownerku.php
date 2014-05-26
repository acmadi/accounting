<?php

class Ownerku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'owner';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_karyawan', 'kd_perusahaan', 'kd_marketing', 'kd_owner', 'username', 'password', 'nama_depan', 'nama_belakang', 'handphone', 'npwp', 'alamat', 'kota', 'propinsi', 'kode_pos', 'email');

  /**
   * getter semua owner
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('owner')
      ->join('karyawan', 'owner.kd_karyawan', '=', 'karyawan.kd_karyawan')
      ->join('perusahaan1', 'owner.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
      ->join('marketing', 'owner.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('karyawan.kd_karyawan', 'perusahaan1.kd_perusahaan', 'marketing.kd_marketing', 'owner.id', 'owner.kd_owner', 'owner.nama_depan', 'owner.nama_belakang', 'owner.handphone', 'owner.npwp', 'owner.kota')
	  
      ->orderBy('owner.kd_owner', 'asc')
	  
      ->get();
  }

  /**
   * getter data owner
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('owner')
      ->join('karyawan', 'owner.kd_karyawan', '=', 'karyawan.kd_karyawan')
      ->join('perusahaan1', 'owner.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
      ->join('marketing', 'owner.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('karyawan.kd_karyawan', 'perusahaan1.kd_perusahaan', 'marketing.kd_marketing', 'owner.id', 'owner.kd_owner', 'owner.nama_depan', 'owner.nama_belakang', 'owner.handphone', 'owner.npwp', 'owner.kota')

      ->orderBy('owner.kd_owner', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut owner
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('karyawan')
      ->join('karyawan', 'owner.kd_karyawan', '=', 'karyawan.kd_karyawan')
      ->join('perusahaan1', 'owner.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
      ->join('marketing', 'owner.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('karyawan.kd_karyawan', 'perusahaan1.kd_perusahaan', 'marketing.kd_marketing', 'owner.id', 'owner.kd_owner', 'owner.nama_depan', 'owner.nama_belakang', 'owner.handphone', 'owner.kota')

	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari owner
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode owner
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('owner')
      ->join('karyawan', 'owner.kd_karyawan', '=', 'karyawan.kd_karyawan')
      ->join('perusahaan1', 'owner.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
      ->join('marketing', 'owner.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('karyawan.kd_karyawan', 'perusahaan1.kd_perusahaan', 'marketing.kd_marketing', 'owner.id', 'owner.kd_owner', 'owner.nama_depan', 'owner.nama_belakang', 'owner.handphone', 'owner.npwp', 'owner.kota')

      ->where('owner.kd_owner', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data owner
   * 
   * @param  array $data data owner
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $owner	          	= new Ownerku;
    $owner->kd_karyawan			= $data['kd_karyawan'];
    $owner->kd_perusahaan  		= $data['kd_perusahaan'];
    $owner->kd_marketing  		= $data['kd_marketing'];
	
    $owner->kd_owner  		= $data['kd_owner'];
    $owner->username  		= $data['username'];
    $owner->password  		= $data['password'];
    $owner->nama_depan 		= $data['nama_depan'];
    $owner->nama_belakang  	= $data['nama_belakang'];
    $owner->handphone 	 	= $data['handphone'];
    $owner->npwp  			= $data['npwp'];
    $owner->alamat  		= $data['alamat'];
    $owner->kota  			= $data['kota'];
    $owner->propinsi  		= $data['propinsi'];
    $owner->kode_pos  		= $data['kode_pos'];
    $owner->email  			= $data['email'];

	
	
    // simpan
    return ($owner->save()) ? true : false;
  }

  /**
   * set owner
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('owner')
      ->join('karyawan', 'owner.kd_karyawan', '=', 'karyawan.kd_karyawan')
      ->join('perusahaan1', 'owner.kd_perusahaan', '=', 'perusahaan1.kd_perusahaan')
      ->join('marketing', 'owner.kd_marketing', '=', 'marketing.kd_marketing')
	  
       ->select('karyawan.kd_karyawan', 'perusahaan1.kd_perusahaan', 'marketing.kd_marketing', 'owner.id', 'owner.kd_owner', 'owner.username', 'owner.password', 'owner.nama_depan', 'owner.nama_belakang', 'owner.handphone', 'owner.npwp', 'owner.alamat', 'owner.kota', 'owner.propinsi', 'owner.kode_pos', 'owner.email')

      ->where('owner.id', '=', $id)
      ->first();
  }

  /**
   * rubah owner
   * 
   * @param  int   $id   id owner
   * @param  array $data data owner
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $owner          = Ownerku::find($id);
	
    $owner->kd_karyawan			= $data['kd_karyawan'];
    $owner->kd_perusahaan  		= $data['kd_perusahaan'];
    $owner->kd_marketing  		= $data['kd_marketing'];
	
    $owner->kd_owner  		= $data['kd_owner'];
    $owner->username  		= $data['username'];
    $owner->password  		= $data['password'];
    $owner->nama_depan 		= $data['nama_depan'];
    $owner->nama_belakang  	= $data['nama_belakang'];
    $owner->handphone 	 	= $data['handphone'];
    $owner->npwp  			= $data['npwp'];
    $owner->alamat  		= $data['alamat'];
    $owner->kota  			= $data['kota'];
    $owner->propinsi  		= $data['propinsi'];
    $owner->kode_pos  		= $data['kode_pos'];
    $owner->email  			= $data['email'];

    // simpan
    return ($owner->save()) ? true : false;
  }

  /**
   * hapus owner
   * 
   * @param  int $id id owner
   * @return void
   */
  public static function hapus($id)
  {
    Ownerku::destroy($id);
  }

}