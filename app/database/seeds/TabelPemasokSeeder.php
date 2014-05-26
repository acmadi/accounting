<?php
class TabelPemasokSeeder extends Seeder {

  public function run()
  {
    DB::table('pemasok')->truncate();

    Supplier::create(array(
      'kode'       => 'S001',
      'nama'       => 'PT INDRACO JAYA PERKASA',
      'npwp'       => '01.012.345.6.789.987',
      'telp'       => '022 9837 4557',
      'fax'        => '022 9837 4557',
      'alamat'     => 'Jl. Bambe No. 21',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    Supplier::create(array(
      'kode'       => 'S002',
      'nama'       => 'PT ANEKA FOOD',
      'npwp'       => '01.012.345.6.789.123',
      'telp'       => '022 9837 4558',
      'fax'        => '022 9837 4558',
      'alamat'     => 'GD Graha BIP No. 15',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    Supplier::create(array(
      'kode'       => 'S003',
      'nama'       => 'PT MISWAK UTAMA',
      'npwp'       => '01.012.345.6.789.456',
      'telp'       => '022 9837 4559',
      'fax'        => '022 9837 4559',
      'alamat'     => 'Jl. Sepat No. 691',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));
  }

}