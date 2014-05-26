<?php

class Karyawanku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'karyawan';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_agama', 'kd_dep', 'kd_jab', 'kd_gol', 'kd_statuskawin', 'kd_karyawan', 'nik', 'nama_depan', 'nama_belakang', 'jen_kel', 'tempat_lahir', 'tgl_lahir', 'pendidikan', 'tgl_masuk', 'tgl_keluar', 'alamat', 'desa', 'kota', 'propinsi', 'kode_pos', 'no_telephone', 'no_handphone', 'email', 'npwp', 'foto');

  /**
   * getter semua karyawan
   * 
   * @return collection
   */
  public static function semua()
  {
    return DB::table('karyawan')
      ->join('agama', 'karyawan.kd_agama', '=', 'agama.kd_agama')
      ->join('departemen', 'karyawan.kd_dep', '=', 'departemen.kd_dep')
      ->join('jabatan', 'karyawan.kd_jab', '=', 'jabatan.kd_jab')
      ->join('golongan', 'karyawan.kd_gol', '=', 'golongan.kd_gol')
      ->join('ptkp', 'karyawan.kd_statuskawin', '=', 'ptkp.kd_statuskawin')
	  
      ->select('agama.kd_agama', 'departemen.kd_dep', 'jabatan.kd_jab', 'golongan.kd_gol', 'ptkp.kd_statuskawin', 'karyawan.kd_karyawan', 'karyawan.id', 'karyawan.nik', 'karyawan.nama_depan', 'karyawan.nama_belakang', 'karyawan.foto')
	  
      ->orderBy('karyawan.kd_karyawan', 'asc')
	  
      ->get();
  }

  /**
   * getter data karyawan
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('karyawan')
      ->join('agama', 'karyawan.kd_agama', '=', 'agama.kd_agama')
      ->join('departemen', 'karyawan.kd_dep', '=', 'departemen.kd_dep')
      ->join('jabatan', 'karyawan.kd_jab', '=', 'jabatan.kd_jab')
      ->join('golongan', 'karyawan.kd_gol', '=', 'golongan.kd_gol')
      ->join('ptkp', 'karyawan.kd_statuskawin', '=', 'ptkp.kd_statuskawin')
	  
      ->select('agama.kd_agama', 'departemen.kd_dep', 'jabatan.kd_jab', 'golongan.kd_gol', 'ptkp.kd_statuskawin', 'karyawan.id', 'karyawan.kd_karyawan', 'karyawan.nik', 'karyawan.nama_depan', 'karyawan.nama_belakang', 'karyawan.foto')

      ->orderBy('karyawan.kd_karyawan', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut karyawan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('karyawan')
      ->join('agama', 'karyawan.kd_agama', '=', 'agama.kd_agama')
      ->join('departemen', 'karyawan.kd_dep', '=', 'departemen.kd_dep')
      ->join('jabatan', 'karyawan.kd_jab', '=', 'jabatan.kd_jab')
      ->join('golongan', 'karyawan.kd_gol', '=', 'golongan.kd_gol')
      ->join('ptkp', 'karyawan.kd_statuskawin', '=', 'ptkp.kd_statuskawin')
	  
      ->select('agama.kd_agama', 'departemen.kd_dep', 'jabatan.kd_jab', 'golongan.kd_gol', 'ptkp.kd_statuskawin', 'karyawan.id', 'karyawan.kd_karyawan', 'karyawan.nik', 'karyawan.nama_depan', 'karyawan.nama_belakang', 'karyawan.foto')

	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari karyawan
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode karyawan
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('karyawan')
      ->join('agama', 'karyawan.kd_agama', '=', 'agama.kd_agama')
      ->join('departemen', 'karyawan.kd_dep', '=', 'departemen.kd_dep')
      ->join('jabatan', 'karyawan.kd_jab', '=', 'jabatan.kd_jab')
      ->join('golongan', 'karyawan.kd_gol', '=', 'golongan.kd_gol')
      ->join('ptkp', 'karyawan.kd_statuskawin', '=', 'ptkp.kd_statuskawin')
	  
      ->select('agama.kd_agama', 'departemen.kd_dep', 'jabatan.kd_jab', 'golongan.kd_gol', 'ptkp.kd_statuskawin', 'karyawan.kd_karyawan', 'karyawan.id', 'karyawan.nik', 'karyawan.nama_depan', 'karyawan.nama_belakang')

      ->where('karyawan.kd_karyawan', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data karyawan
   * 
   * @param  array $data data karyawan
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $karyawan	          	= new Karyawanku;

    $karyawan->kd_agama			= $data['kd_agama'];
    $karyawan->kd_dep  			= $data['kd_dep'];
    $karyawan->kd_jab  			= $data['kd_jab'];
    $karyawan->kd_gol			= $data['kd_gol'];
    $karyawan->kd_statuskawin  	= $data['kd_statuskawin'];
	
    $karyawan->kd_karyawan  	= $data['kd_karyawan'];
    $karyawan->nik				= $data['nik'];
    $karyawan->nama_depan  		= $data['nama_depan'];
    $karyawan->nama_belakang  	= $data['nama_belakang'];
    $karyawan->jen_kel			= $data['jen_kel'];
    $karyawan->tempat_lahir  	= $data['tempat_lahir'];
    $karyawan->tgl_lahir  		= $data['tgl_lahir'];
    $karyawan->pendidikan		= $data['pendidikan'];
    $karyawan->tgl_masuk  		= $data['tgl_masuk'];
    $karyawan->tgl_keluar	  	= $data['tgl_keluar'];
    $karyawan->alamat			= $data['alamat'];
    $karyawan->desa  			= $data['desa'];
    $karyawan->kota  			= $data['kota'];
    $karyawan->propinsi			= $data['propinsi'];
    $karyawan->kode_pos  		= $data['kode_pos'];
    $karyawan->no_telephone  	= $data['no_telephone'];
    $karyawan->no_handphone		= $data['no_handphone'];
    $karyawan->email  			= $data['email'];
    $karyawan->npwp  			= $data['npwp'];
	
    if (isset($data[0]['foto']))	
	    $karyawan->foto   			= $data[0]['foto'];
		dd($data[0]['foto']);
		
    // simpan
    return ($karyawan->save()) ? true : false;
  }

  /**
   * set karyawan
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('karyawan')
      ->join('agama', 'karyawan.kd_agama', '=', 'agama.kd_agama')
      ->join('departemen', 'karyawan.kd_dep', '=', 'departemen.kd_dep')
      ->join('jabatan', 'karyawan.kd_jab', '=', 'jabatan.kd_jab')
      ->join('golongan', 'karyawan.kd_gol', '=', 'golongan.kd_gol')
      ->join('ptkp', 'karyawan.kd_statuskawin', '=', 'ptkp.kd_statuskawin')
	  
       ->select('agama.kd_agama', 'departemen.kd_dep', 'jabatan.kd_jab', 'golongan.kd_gol', 'ptkp.kd_statuskawin', 'karyawan.id', 'karyawan.kd_karyawan', 'karyawan.nik', 'karyawan.nama_depan', 'karyawan.nama_belakang', 'karyawan.jen_kel', 'karyawan.tempat_lahir', 'karyawan.tgl_lahir', 'karyawan.pendidikan', 'karyawan.tgl_masuk', 'karyawan.tgl_keluar', 'karyawan.alamat', 'karyawan.desa', 'karyawan.kota', 'karyawan.propinsi', 'karyawan.kode_pos', 'karyawan.no_telephone', 'karyawan.no_handphone', 'karyawan.email', 'karyawan.npwp', 'karyawan.foto')

      ->where('karyawan.id', '=', $id)
      ->first();
  }

  /**
   * rubah karyawan
   * 
   * @param  int   $id   id karyawan
   * @param  array $data data karyawan
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $karyawan          = Karyawanku::find($id);
	
    $karyawan->kd_agama			= $data['kd_agama'];
    $karyawan->kd_dep  			= $data['kd_dep'];
    $karyawan->kd_jab  			= $data['kd_jab'];
    $karyawan->kd_gol			= $data['kd_gol'];
    $karyawan->kd_statuskawin  	= $data['kd_statuskawin'];
	
    $karyawan->kd_karyawan  	= $data['kd_karyawan'];
    $karyawan->nik				= $data['nik'];
    $karyawan->nama_depan  		= $data['nama_depan'];
    $karyawan->nama_belakang  	= $data['nama_belakang'];
    $karyawan->jen_kel			= $data['jen_kel'];
    $karyawan->tempat_lahir  	= $data['tempat_lahir'];
    $karyawan->tgl_lahir  		= $data['tgl_lahir'];
    $karyawan->pendidikan		= $data['pendidikan'];
    $karyawan->tgl_masuk  		= $data['tgl_masuk'];
    $karyawan->tgl_keluar	  	= $data['tgl_keluar'];
    $karyawan->alamat			= $data['alamat'];
    $karyawan->desa  			= $data['desa'];
    $karyawan->kota  			= $data['kota'];
    $karyawan->propinsi			= $data['propinsi'];
    $karyawan->kode_pos  		= $data['kode_pos'];
    $karyawan->no_telephone  	= $data['no_telephone'];
    $karyawan->no_handphone		= $data['no_handphone'];
    $karyawan->email  			= $data['email'];
    $karyawan->npwp  			= $data['npwp'];
    $karyawan->foto  			= $data['foto'];

    // simpan
    return ($karyawan->save()) ? true : false;
  }

  /**
   * hapus karyawan
   * 
   * @param  int $id id karyawan
   * @return void
   */
  public static function hapus($id)
  {		
	Karyawanku::destroy($id);
  }
  
  

  
  

}