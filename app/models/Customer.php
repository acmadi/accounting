<?php

class Customer extends Eloquent {

  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'pelanggan';

  /**
   * Fillable column
   *
   * @var array
   */
  protected $fillable = array('kode', 'nama', 'telp', 'alamat');

  /**
   * getter semua pelanggan
   * 
   * @return collection
   */
  public static function semua()
  {
    return Customer::orderBy('kode', 'asc')
      ->get();
  }

  /**
   * getter data pelanggan
   * 
   * @return collection
   */
  public static function data()
  {
    return Customer::orderBy('kode', 'asc')
      ->paginate(10);
  }

  /**
   * urut customer
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @return collection
   */
  public static function urut($kolom, $tipe)
  {
    return Customer::orderBy($kolom, $tipe)
      ->paginate(10);
  }

  /**
   * cari customer
   * 
   * @param  string $kolom nama kolom pengurutan
   * @param  string $tipe  tipe pengurutan
   * @param  string $cari  kode customer
   * @return collection
   */
  public static function cari($kolom, $tipe, $cari)
  {
    return Customer::orderBy($kolom, $tipe)
      ->where('kode', 'like', '%'.$cari.'%')
      ->get();
  }


  /**
   * tambah data pelanggan
   * 
   * @param  array $data data pelanggan
   * @return bool
   */
  public static function tambah($data)
  {
    // data
    $customer           = new Customer;
    $customer->kode     = $data['kode'];
    $customer->nama     = $data['nama'];
    $customer->telp     = $data['telp'];
    $customer->alamat   = $data['alamat'];

    // simpan
    return ($customer->save()) ? true : false;
  }

  /**
   * set customer
   * 
   * @param int $id 
   */
  public static function set($id)
  {
    return Customer::find($id);
  }

  /**
   * rubah customer
   * 
   * @param  int   $id   id customer
   * @param  array $data data customer
   * @return bool
   */
  public static function rubah($id, $data)
  {
    // data
    $customer           = Customer::find($id);
    $customer->kode     = $data['kode'];
    $customer->nama     = $data['nama'];
    $customer->telp     = $data['telp'];
    $customer->alamat   = $data['alamat'];

    // simpan
    return ($customer->save()) ? true : false;
  }

  /**
   * hapus customer
   * 
   * @param  int $id id customer
   * @return void
   */
  public static function hapus($id)
  {
    Customer::destroy($id);
  }

}