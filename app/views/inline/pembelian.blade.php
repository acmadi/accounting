<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pembelian') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Tanggal">
      <option value="pembelian.created_at-asc">Ascending</option>
      <option value="pembelian.created_at-desc">Descending</option>
    </optgroup>
    
    <optgroup label="Nama Pemasok">
      <option value="pemasok.nama-asc">Ascending</option>
      <option value="pemasok.nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Nama Barang">
      <option value="barang.nama-asc">Ascending</option>
      <option value="barang.nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Jumlah">
      <option value="pembelian.jumlah-asc">Ascending</option>
      <option value="pembelian.jumlah-desc">Descending</option>
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