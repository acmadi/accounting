<?php
class TabelPerusahaanSeeder extends Seeder {

  public function run()
  {
    DB::table('perusahaan')->truncate();

    Corp::create(array(
      'logo'       => '',
      'nama'       => 'HERU CORP',
      'alamat'     => 'Jl. Cikutra No. 49 Email: info@herucorp.co.id Telp: 0123456789 Fax: 0123456 Web: www.herucorp.co.id Bandung - Jawa Barat',
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));
  }

}