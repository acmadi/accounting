<?php
class TabelPelangganSeeder extends Seeder {

  public function run()
  {
    DB::table('pelanggan')->truncate();

    Customer::create(array(
      'kode'       => 'C001',
      'nama'       => 'CAHYANGGA',
      'telp'       => '0856 3452 7364',
      'alamat'     => 'Jl. Yudhawastu No. 23',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    Customer::create(array(
      'kode'       => 'C002',
      'nama'       => 'IMAS',
      'telp'       => '022 8654 4434',
      'alamat'     => 'Jl. Ciwastra No. 95',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    Customer::create(array(
      'kode'       => 'C003',
      'nama'       => 'ASEP',
      'telp'       => '022 3890 4590',
      'alamat'     => 'Jl. Ciwidey No. 11',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));
  }

}