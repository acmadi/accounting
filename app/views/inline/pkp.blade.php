<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pkp') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Pkp">
      <option value="kd_pkp-asc">Ascending</option>
      <option value="kd_pkp-desc">Descending</option>
    </optgroup>


  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode pkp...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->