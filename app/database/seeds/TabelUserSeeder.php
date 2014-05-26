<?php
class TabelUserSeeder extends Seeder {

  public function run()
  {
    DB::table('users')->truncate();

    User::create(array(
      'foto'       => '',
      'nama'       => 'Admin',
      'email'      => 'admin@local.com',
      'akses'      => '3',
      'alamat'     => 'Bandung',
      'username'   => 'admin',
      'password'   => Hash::make('adminlocal'),
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    User::create(array(
      'foto'       => '',
      'nama'       => 'Heru Rusdianto',
      'email'      => 'heru@local.com',
      'akses'      => '2',
      'alamat'     => 'Subang',
      'username'   => 'herubrondong',
      'password'   => Hash::make('brondong'),
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));

    User::create(array(
      'foto'       => '',
      'nama'       => 'Ibnu Rusdianto',
      'email'      => 'ibnu@local.com',
      'akses'      => '1',
      'alamat'     => 'Cigugur',
      'username'   => 'inugrepes',
      'password'   => Hash::make('inuganteng'),
      'created_at' => new DateTime(),
      'updated_at' => new DateTime()
    ));
  }

}