<?php
class TabelBarangSeeder extends Seeder {

  public function run()
  {
    DB::table('barang')->truncate();

    Barang::create(array(
      'kode'       => 'C001',
      'nama'       => 'Cabe Bubuk Cipcip',
      'satuan'     => 'Pak',
      'beli'       => 1500,
      'jual'       => 2000,
      'created_at' => new DateTime('2014-04-01'),
      'updated_at' => new DateTime('2014-04-01')
    ));

    Barang::create(array(
      'kode'       => 'K001',
      'nama'       => 'Kecap OJS Merah',
      'satuan'     => 'Botol',
      'beli'       => 8000,
      'jual'       => 8500,
      'created_at' => new DateTime('2014-04-11'),
      'updated_at' => new DateTime('2014-04-11')
    ));

    Barang::create(array(
      'kode'       => 'L001',
      'nama'       => 'Lilin Cap Kabayan',
      'satuan'     => 'Pak',
      'beli'       => 25000,
      'jual'       => 26000,
      'created_at' => new DateTime('2014-04-21'),
      'updated_at' => new DateTime('2014-04-21')
    ));

    Barang::create(array(
      'kode'       => 'K002',
      'nama'       => 'Kecap OJS Hijau',
      'satuan'     => 'Botol',
      'beli'       => 8000,
      'jual'       => 8500,
      'created_at' => new DateTime('2014-05-11'),
      'updated_at' => new DateTime('2014-05-11')
    ));

    Barang::create(array(
      'kode'       => 'M001',
      'nama'       => 'Marie Biskuit',
      'satuan'     => 'Pcs',
      'beli'       => 5000,
      'jual'       => 5500,
      'created_at' => new DateTime('2014-05-15'),
      'updated_at' => new DateTime('2014-05-15')
    ));

    Barang::create(array(
      'kode'       => 'N001',
      'nama'       => 'Niki Nangka',
      'satuan'     => 'Pak',
      'beli'       => 15000,
      'jual'       => 16000,
      'created_at' => new DateTime('2014-06-03'),
      'updated_at' => new DateTime('2014-06-03')
    ));
  }

}