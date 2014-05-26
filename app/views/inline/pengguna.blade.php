<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pengguna') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Nama">
      <option value="nama-asc">Ascending</option>
      <option value="nama-desc">Descending</option>
    </optgroup>

    <optgroup label="Email">
      <option value="email-asc">Ascending</option>
      <option value="email-desc">Descending</option>
    </optgroup>

    <optgroup label="Jabatan">
      <option value="akses-asc">Ascending</option>
      <option value="akses-desc">Descending</option>
    </optgroup>

    <optgroup label="Alamat">
      <option value="alamat-asc">Ascending</option>
      <option value="alamat-desc">Descending</option>
    </optgroup>

    <optgroup label="Username">
      <option value="username-asc">Ascending</option>
      <option value="username-desc">Descending</option>
    </optgroup>

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan nama...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->