<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_marketing') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Kode Marketing">
      <option value="kd_marketing-asc">Ascending</option>
      <option value="kd_marketing-desc">Descending</option>
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