<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('TabelUserSeeder');
		$this->command->info('Data tabel user berhasil dibuat!');

		$this->call('TabelPerusahaanSeeder');
		$this->command->info('Data tabel perusahaan berhasil dibuat!');

		$this->call('TabelPemasokSeeder');
		$this->command->info('Data tabel pemasok berhasil dibuat!');

		$this->call('TabelPelangganSeeder');
		$this->command->info('Data tabel pelanggan berhasil dibuat!');

		$this->call('TabelBarangSeeder');
		$this->command->info('Data tabel barang berhasil dibuat!');

		$this->call('TabelPembelianSeeder');
		$this->command->info('Data tabel pembelian berhasil dibuat!');

		$this->call('TabelPenjualanSeeder');
		$this->command->info('Data tabel penjualan berhasil dibuat!');

		$this->call('TabelPemasukanSeeder');
		$this->command->info('Data tabel pemasukan berhasil dibuat!');

		$this->call('TabelPengeluaranSeeder');
		$this->command->info('Data tabel pengeluaran berhasil dibuat!');
	}

}