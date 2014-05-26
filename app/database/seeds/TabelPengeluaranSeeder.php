<?php
class TabelPengeluaranSeeder extends Seeder {

  public function run()
  {
    DB::table('pengeluaran')->truncate();

    Keluar::create(array(
      'pelanggan'  => 'C001',
      'barang'     => 'C001',
      'jumlah'     => 10,
      'created_at' => new DateTime('2014-04-01'),
      'updated_at' => new DateTime('2014-04-01')
    ));

    Keluar::create(array(
      'pelanggan'  => 'C002',
      'barang'     => 'K001',
      'jumlah'     => 15,
      'created_at' => new DateTime('2014-04-11'),
      'updated_at' => new DateTime('2014-04-11')
    ));

    Keluar::create(array(
      'pelanggan'  => 'C003',
      'barang'     => 'L001',
      'jumlah'     => 20,
      'created_at' => new DateTime('2014-04-21'),
      'updated_at' => new DateTime('2014-04-21')
    ));

    Keluar::create(array(
      'pelanggan'  => 'C001',
      'barang'     => 'K002',
      'jumlah'     => 28,
      'created_at' => new DateTime('2014-05-11'),
      'updated_at' => new DateTime('2014-05-11')
    ));

    Keluar::create(array(
      'pelanggan'  => 'C002',
      'barang'     => 'M001',
      'jumlah'     => 22,
      'created_at' => new DateTime('2014-05-15'),
      'updated_at' => new DateTime('2014-05-15')
    ));

    Keluar::create(array(
      'pelanggan'  => 'C003',
      'barang'     => 'N001',
      'jumlah'     => 25,
      'created_at' => new DateTime('2014-06-03'),
      'updated_at' => new DateTime('2014-06-03')
    ));
  }

}