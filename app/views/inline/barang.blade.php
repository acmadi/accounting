<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_barang') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Tanggal">
      <option value="created_at-asc">Ascending</option>
      <option value="created_at-desc">Descending</option>
    </optgroup>
    
    <optgroup label="Kode">
      <option value="kode-asc">Ascending</option>
      <option value="kode-desc">Descending</option>
    </optgroup>

    <optgroup label="Nama">
      <option value="nama-asc">Ascending</option>
      <option value="nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Satuan">
      <option value="satuan-asc">Ascending</option>
      <option value="satuan-desc">Descending</option>
    </optgroup>

    <optgroup label="Harga Beli">
      <option value="beli-asc">Ascending</option>
      <option value="beli-desc">Descending</option>
    </optgroup>

    <optgroup label="Harga Jual">
      <option value="jual-asc">Ascending</option>
      <option value="jual-desc">Descending</option>
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