<?php

class Agendaku extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'agenda';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kd_marketing', 'kd_agenda', 'nama_agenda', 'keterangan');

  /**
   * getter semua agenda
   * 
   * @return collection
   */
   
  public static function semua()
  {
    return DB::table('agenda')
      ->join('marketing', 'agenda.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'agenda.id', 'agenda.kd_agenda', 'agenda.nama_agenda', 'agenda.keterangan')
	  
      ->orderBy('agenda.kd_agenda', 'asc')
	  
      ->get();
  }

  /**
   * getter data agenda
   * 
   * @return collection
   */
   
  public static function data()
  {
    return DB::table('agenda')
      ->join('marketing', 'agenda.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'agenda.id', 'agenda.kd_agenda', 'agenda.nama_agenda', 'agenda.keterangan')
	  
      ->orderBy('agenda.kd_agenda', 'asc')
	  
      ->paginate(10);
  }

  /**
   * urut agenda
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
   return DB::table('agenda')
      ->join('marketing', 'agenda.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'agenda.id', 'agenda.kd_agenda', 'agenda.nama_agenda', 'agenda.keterangan')
	  
	   ->orderBy($kolom, $tipe)
	  
      ->paginate(10);
  }

  /**
   * cari agenda
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode agenda
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return DB::table('agenda')
      ->join('marketing', 'agenda.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'agenda.id', 'agenda.kd_agenda', 'agenda.nama_agenda', 'agenda.keterangan')

      ->where('agenda.kd_agenda', 'like', '%'.$cari.'%')
      ->orderBy($kolom, $tipe)
      ->paginate(10);
  }


  /**
   * tambah data agenda
   * 
   * @param  array $data data agenda
   * @return bool
   */
  public static function tambah($data)
  {
  
error_reporting("E_ALL") ;

    // data
    $agenda	          		= new Agendaku;
	
    $agenda->kd_marketing	= $data['kd_marketing'];
	
    $agenda->kd_agenda  		= $data['kd_agenda'];
    $agenda->nama_agenda  		= $data['nama_agenda'];
    $agenda->keterangan  		= $data['keterangan'];
	
    // simpan
    return ($agenda->save()) ? true : false;
  }

  /**
   * set agenda
   * 
   * @param int $id 
   */
  public static function set($id)
  {
   return DB::table('agenda')
      ->join('marketing', 'agenda.kd_marketing', '=', 'marketing.kd_marketing')
	  
      ->select('marketing.kd_marketing', 'agenda.id', 'agenda.kd_agenda', 'agenda.nama_agenda', 'agenda.keterangan')

      ->where('agenda.id', '=', $id)
      ->first();
  }

  /**
   * rubah pph
   * 
   * @param  int   $id   id agenda
   * @param  array $data data agenda
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $agenda          = Agendaku::find($id);
	
    $agenda->kd_marketing		= $data['kd_marketing'];
	
    $agenda->kd_agenda  		= $data['kd_agenda'];
    $agenda->nama_agenda  		= $data['nama_agenda'];
    $agenda->keterangan  		= $data['keterangan'];

    // simpan
    return ($agenda->save()) ? true : false;
  }

  /**
   * hapus agenda
   * 
   * @param  int $id id agenda
   * @return void
   */
   
  public static function hapus($id)
  {
    Agendaku::destroy($id);
  }

}