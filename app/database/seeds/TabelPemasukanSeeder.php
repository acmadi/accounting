<?php
class TabelPemasukanSeeder extends Seeder {

  public function run()
  {
    DB::table('pemasukan')->truncate();

    Masuk::create(array(
      'pemasok'    => 'S001',
      'barang'     => 'C001',
      'jumlah'     => 110,
      'created_at' => new DateTime('2014-04-01'),
      'updated_at' => new DateTime('2014-04-01')
    ));

    Masuk::create(array(
      'pemasok'    => 'S002',
      'barang'     => 'K001',
      'jumlah'     => 45,
      'created_at' => new DateTime('2014-04-11'),
      'updated_at' => new DateTime('2014-04-11')
    ));

    Masuk::create(array(
      'pemasok'    => 'S003',
      'barang'     => 'L001',
      'jumlah'     => 80,
      'created_at' => new DateTime('2014-04-21'),
      'updated_at' => new DateTime('2014-04-21')
    ));

    Masuk::create(array(
      'pemasok'    => 'S001',
      'barang'     => 'K002',
      'jumlah'     => 48,
      'created_at' => new DateTime('2014-05-11'),
      'updated_at' => new DateTime('2014-05-11')
    ));

    Masuk::create(array(
      'pemasok'    => 'S002',
      'barang'     => 'M001',
      'jumlah'     => 72,
      'created_at' => new DateTime('2014-05-15'),
      'updated_at' => new DateTime('2014-05-15')
    ));

    Masuk::create(array(
      'pemasok'    => 'S003',
      'barang'     => 'N001',
      'jumlah'     => 100,
      'created_at' => new DateTime('2014-06-03'),
      'updated_at' => new DateTime('2014-06-03')
    ));
  }

}