<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pelanggan') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Kode">
      <option value="kode-asc">Ascending</option>
      <option value="kode-desc">Descending</option>
    </optgroup>

    <optgroup label="Nama">
      <option value="nama-asc">Ascending</option>
      <option value="nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Telp">
      <option value="telp-asc">Ascending</option>
      <option value="telp-desc">Descending</option>
    </optgroup>

    <optgroup label="Alamat">
      <option value="alamat-asc">Ascending</option>
      <option value="alamat-desc">Descending</option>
    </optgroup>

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode customer...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->