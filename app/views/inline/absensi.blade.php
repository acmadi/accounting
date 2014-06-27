<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_absensi') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="kd_absen">
      <option value="kd_absen-asc">Ascending</option>
      <option value="kd_absen-desc">Descending</option>
    </optgroup>
    

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode absensi...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->

