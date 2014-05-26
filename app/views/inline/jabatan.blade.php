<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_jabatan') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Kode Jabatan">
      <option value="kd_jab-asc">Ascending</option>
      <option value="kd_jab-desc">Descending</option>
    </optgroup>

    <optgroup label="Nama Jabatan">
      <option value="nama_jabatan-asc">Ascending</option>
      <option value="nama_jabatan-desc">Descending</option>
    </optgroup>

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan nama jabatan...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->