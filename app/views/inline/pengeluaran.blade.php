<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pengeluaran') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Tanggal">
      <option value="pengeluaran.created_at-asc">Ascending</option>
      <option value="pengeluaran.created_at-desc">Descending</option>
    </optgroup>
    
    <optgroup label="Pelanggan">
      <option value="pelanggan.nama-asc">Ascending</option>
      <option value="pelanggan.nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Kode">
      <option value="pengeluaran.barang-asc">Ascending</option>
      <option value="pengeluaran.barang-desc">Descending</option>
    </optgroup>

    <optgroup label="Nama">
      <option value="barang.nama-asc">Ascending</option>
      <option value="barang.nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Satuan">
      <option value="barang.satuan-asc">Ascending</option>
      <option value="barang.satuan-desc">Descending</option>
    </optgroup>

    <optgroup label="Jumlah">
      <option value="pengeluaran.jumlah-asc">Ascending</option>
      <option value="pengeluaran.jumlah-desc">Descending</option>
    </optgroup>

    <optgroup label="Harga">
      <option value="barang.jual-asc">Ascending</option>
      <option value="barang.jual-desc">Descending</option>
    </optgroup>


  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode barang...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->