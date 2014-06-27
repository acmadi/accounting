<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pph') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="kode_pph">
      <option value="kd_pph-asc">Ascending</option>
      <option value="kd_pph-desc">Descending</option>
    </optgroup>
    

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode pph...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->
