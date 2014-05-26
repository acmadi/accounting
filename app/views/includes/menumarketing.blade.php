<!-- .nav-parent -->
<ul class="nav nav-pills nav-stacked nav-parent">

  <!-- master -->
  <li>
    <a data-toggle="collapse" data-parent="#menu" href="#master" class="menu">
      <span class="pull-right glyphicon glyphicon-chevron-{{ (Request::segment(1) == 'pengguna' || Request::segment(1) == 'agama' || Request::segment(1) == 'departemen' || Request::segment(1) == '' || Request::segment(1) == 'jabatan' || Request::segment(1) == 'golongan' || Request::segment(1) == 'ptkp' || Request::segment(1) == 'perusahaan1' || Request::segment(1) == 'marketing' || Request::segment(1) == 'karyawan' || Request::segment(1) == 'owner') ? 'down' : 'right' }} arrow-menu"></span>
      <img src="{{ asset('foto/master.png') }}" align="absmiddle" width=20 height=20>  Master
    </a>
  </li>

    <!-- .nav-child -->
    <ul class="nav nav-stacked nav-child collapse {{ (Request::segment(1) == 'pengguna' || Request::segment(1) == 'agama' || Request::segment(1) == 'departemen' || Request::segment(1) == '' || Request::segment(1) == 'jabatan' || Request::segment(1) == 'golongan' || Request::segment(1) == 'ptkp' || Request::segment(1) == 'perusahaan1' || Request::segment(1) == 'marketing' || Request::segment(1) == 'karyawan' || Request::segment(1) == 'owner') ? 'in' : '' }}" id="master">

      <!-- pengguna super user -->
      <li class="{{ cek_link('pengguna') }}">
        <a href="{{ route('pengguna.index') }}">
          <img src="{{ asset('foto/karyawan.png') }}" align="absmiddle" width=20 height=20> Super User
        </a>
      </li>
      <!-- /pengguna super user-->
	  
	  

      <!-- agama -->
      <li class="{{ cek_link('agama') }}">
        <a href="{{ route('agama.index') }}">
          <img src="{{ asset('foto/agama.png') }}" align="absmiddle" width=20 height=20> Agama
        </a>
      </li>
      <!-- /agama-->	  

	  
      <!--departemen -->
      <li class="{{ cek_link('departemen') }}">
        <a href="{{ route('departemen.index') }}">
          <img src="{{ asset('foto/department.png') }}" align="absmiddle" width=20 height=20> Departement
        </a>
      </li>
      <!-- /departemen-->		  


      <!--jabatan -->
      <li class="{{ cek_link('jabatan') }}">
        <a href="{{ route('jabatan.index') }}">
          <img src="{{ asset('foto/jabatan.png') }}" align="absmiddle" width=20 height=20> Jabatan
        </a>
      </li>
      <!-- /jabatan-->		  
	  

      <!--golongan -->
      <li class="{{ cek_link('golongan') }}">
        <a href="{{ route('golongan.index') }}">
          <img src="{{ asset('foto/golongan.png') }}" align="absmiddle" width=20 height=20> Golongan
        </a>
      </li>
      <!-- /golongan-->		  


      <!--ptkp -->
      <li class="{{ cek_link('ptkp') }}">
        <a href="{{ route('ptkp.index') }}">
          <img src="{{ asset('foto/ptkp.png') }}" align="absmiddle" width=20 height=20> PTKP
        </a>
      </li>
      <!-- /ptkp-->		  

	  
      <!--perusahaan1-->
      <li class="{{ cek_link('perusahaan1') }}">
        <a href="{{ route('perusahaan1.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Perusahaan
        </a>
      </li>
      <!-- /perusahaan-->			  


      <!--marketing-->
      <li class="{{ cek_link('marketing') }}">
        <a href="{{ route('marketing.index') }}">
          <img src="{{ asset('foto/marketing.png') }}" align="absmiddle" width=20 height=20> Marketing
        </a>
      </li>
      <!-- /marketing-->	

	  
      <!--karyawan-->
      <li class="{{ cek_link('karyawan') }}">
        <a href="{{ route('karyawan.index') }}">
          <img src="{{ asset('foto/karyawan.png') }}" align="absmiddle" width=20 height=20> Karyawan
        </a>
      </li>
      <!-- /karyawan-->		  


      <!--owner-->
      <li class="{{ cek_link('owner') }}">
        <a href="{{ route('owner.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Owner
        </a>
      </li>
      <!-- /owner-->		  



	  
    </ul>
    <!-- /.nav-child -->
  <!-- /master -->

 
  <!-- faktur pembelian -->
  <li>
    <a data-toggle="collapse" data-parent="#menu" href="#faktur" class="menu">
      <span class="pull-right glyphicon glyphicon-chevron-{{ (Request::segment(1) == 'pembelian' || Request::segment(1) == 'penjualan') ? 'down' : 'right' }} arrow-menu"></span>
		<img src="{{ asset('foto/modulblu.png') }}" align="absmiddle" width=25 height=25> Module
    </a>
  </li>

    <!-- .nav-child -->
    <ul class="nav nav-stacked nav-child collapse {{ (Request::segment(1) == 'pembelian' || Request::segment(1) == 'penjualan') ? 'in' : '' }}" id="faktur">

      <li class="{{ cek_link('pembelian') }}">
        <a href="{{ route('pembelian.index') }}">
          <img src="{{ asset('foto/modul.png') }}" align="absmiddle" width=25 height=25> Module 1
        </a>
      </li>

      <li class="{{ cek_link('pengeluaran') }}">
        <a href="{{ route('pengeluaran.index') }}">
          <img src="{{ asset('foto/modul.png') }}" align="absmiddle" width=25 height=25> Module 2
        </a>
      </li>

    </ul>
    <!-- /.nav-child -->
  <!-- /faktur pembelian -->

  <!-- pengaturan -->
  <li>
    <a data-toggle="collapse" data-parent="#menu" href="#pengaturan" class="menu">
      <span class="pull-right glyphicon glyphicon-chevron-{{ (Request::segment(1) == 'profil' || Request::segment(1) == 'perusahaan') ? 'down' : 'right' }} arrow-menu"></span>
      <img src="{{ asset('foto/pengaturanblu.png') }}" align="absmiddle" width=20 height=20> Pengaturan
    </a>
  </li>

    <!-- .nav-child -->
    <ul class="nav nav-stacked nav-child collapse {{ (Request::segment(1) == 'profil' || Request::segment(1) == 'perusahaan') ? 'in' : '' }}" id="pengaturan">

      <li class="{{ cek_link('profil') }}">
        <a href="{{ route('profil') }}">
          <span class="glyphicon glyphicon-cog"></span> Profil
        </a>
      </li>

	  
      <li class="{{ cek_link('perusahaan') }}">
        <a href="{{ route('perusahaan') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Perusahaan
        </a>
      </li>

    </ul>
    <!-- /.nav-child -->
  <!-- /pengaturan -->

  <!-- akun -->
  <li>
    <a data-toggle="collapse" data-parent="#menu" href="#akun" class="menu">
      <span class="pull-right glyphicon glyphicon-chevron-{{ (Request::segment(1) == 'akun') ? 'down' : 'right' }} arrow-menu"></span>
      <span class="glyphicon glyphicon-tower"></span> Akun
    </a>
  </li>

    <!-- .nav-child -->
    <ul class="nav nav-stacked nav-child collapse {{ (Request::segment(1) == 'akun') ? 'in' : '' }}" id="akun">

      <li class="{{ cek_link('akun', 'profil') }}">
        <a href="{{ route('logout') }}">
          <span class="glyphicon glyphicon-off"></span> Logout
        </a>
      </li>

    </ul>
    <!-- /.nav-child -->
  <!-- /akun -->

</ul>
<!-- /.nav-parent -->