<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pemasukan') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Tanggal">
      <option value="pemasukan.created_at-asc">Ascending</option>
      <option value="pemasukan.created_at-desc">Descending</option>
    </optgroup>
    
    <optgroup label="Pemasok">
      <option value="pemasok.nama-asc">Ascending</option>
      <option value="pemasok.nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Kode">
      <option value="pemasukan.barang-asc">Ascending</option>
      <option value="pemasukan.barang-desc">Descending</option>
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
      <option value="pemasukan.jumlah-asc">Ascending</option>
      <option value="pemasukan.jumlah-desc">Descending</option>
    </optgroup>

    <optgroup label="Harga">
      <option value="barang.beli-asc">Ascending</option>
      <option value="barang.beli-desc">Descending</option>
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