<?php
class TabelPembelianSeeder extends Seeder {

  public function run()
  {
    DB::table('pembelian')->truncate();

    Beli::create(array(
      'pemasok'    => 'S001',
      'barang'     => 'C001',
      'jumlah'     => 110,
      'created_at' => new DateTime('2014-03-29'),
      'updated_at' => new DateTime('2014-03-29')
    ));

    Beli::create(array(
      'pemasok'    => 'S002',
      'barang'     => 'K001',
      'jumlah'     => 45,
      'created_at' => new DateTime('2014-04-01'),
      'updated_at' => new DateTime('2014-04-01')
    ));

    Beli::create(array(
      'pemasok'    => 'S003',
      'barang'     => 'L001',
      'jumlah'     => 80,
      'created_at' => new DateTime('2014-04-11'),
      'updated_at' => new DateTime('2014-04-11')
    ));

    Beli::create(array(
      'pemasok'    => 'S001',
      'barang'     => 'K002',
      'jumlah'     => 48,
      'created_at' => new DateTime('2014-05-01'),
      'updated_at' => new DateTime('2014-05-01')
    ));

    Beli::create(array(
      'pemasok'    => 'S002',
      'barang'     => 'M001',
      'jumlah'     => 72,
      'created_at' => new DateTime('2014-05-08'),
      'updated_at' => new DateTime('2014-05-08')
    ));

    Beli::create(array(
      'pemasok'    => 'S003',
      'barang'     => 'N001',
      'jumlah'     => 100,
      'created_at' => new DateTime('2014-06-02'),
      'updated_at' => new DateTime('2014-06-02')
    ));
  }

}