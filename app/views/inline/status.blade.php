<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_status') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="Kode status">
      <option value="id_status-asc">Ascending</option>
      <option value="id_status-desc">Descending</option>
    </optgroup>
	
	

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode status...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->