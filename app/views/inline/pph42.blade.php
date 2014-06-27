<!-- .form-inline -->
<form class="form-inline text-right" action="{{ route('cari_pph42') }}" method="post">

  <!-- urut -->
  <label for="sort">Urutkan : </label>

  <select name="sort" id="sort" class="form-control">

    <optgroup label="id_pph42">
      <option value="id_pph42-asc">Ascending</option>
      <option value="id_pph42-desc">Descending</option>
    </optgroup>
    

  </select>
  <!-- /urut -->

  <!-- cari -->
    <label for="sort">Cari : </label>

    <input type="text" name="cari" class="form-control" placeholder="Masukkan kode pph42...">
  <!-- /cari -->

  <button type="submit" class="btn btn-primary">
    <span class="glyphicon glyphicon-search"></span>
  </button>

</form>
<!-- /.form-inline -->
