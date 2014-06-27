<!-- .nav-parent -->
<ul class="nav nav-pills nav-stacked nav-parent">

  <!-- master -->
  <li>
    <a data-toggle="collapse" data-parent="#menu" href="#master" class="menu">
      <span class="pull-right glyphicon glyphicon-chevron-{{ (Request::segment(1) == 'pengguna' || Request::segment(1) == 'agama' || Request::segment(1) == 'departemen' || Request::segment(1) == '' || Request::segment(1) == 'jabatan' || Request::segment(1) == 'golongan' || Request::segment(1) == 'ptkp' || Request::segment(1) == 'perusahaan1' || Request::segment(1) == 'marketing' || Request::segment(1) == 'karyawan' || Request::segment(1) == 'owner' || Request::segment(1) == 'harga' || Request::segment(1) == 'potongan' || Request::segment(1) == 'pkp' || Request::segment(1) == 'detailgaji' || Request::segment(1) == 'absensi' || Request::segment(1) == 'tunjangan' || Request::segment(1) == 'lembur' || Request::segment(1) == 'penilaian' || Request::segment(1) == 'pph' || Request::segment(1) == 'supportticket' || Request::segment(1) == 'ticketreply' || Request::segment(1) == 'agenda' || Request::segment(1) == 'pph42' || Request::segment(1) == 'gaji' || Request::segment(1) == 'sewa' || Request::segment(1) == 'ppn' || Request::segment(1) == 'status') ? 'down' : 'right' }} arrow-menu"></span>
      <img src="{{ asset('foto/master.png') }}" align="absmiddle" width=20 height=20>  Master
    </a>
  </li>

    <!-- .nav-child -->
    <ul class="nav nav-stacked nav-child collapse {{ (Request::segment(1) == 'pengguna' || Request::segment(1) == 'agama' || Request::segment(1) == 'departemen' || Request::segment(1) == '' || Request::segment(1) == 'jabatan' || Request::segment(1) == 'golongan' || Request::segment(1) == 'ptkp' || Request::segment(1) == 'perusahaan1' || Request::segment(1) == 'marketing' || Request::segment(1) == 'karyawan' || Request::segment(1) == 'owner' || Request::segment(1) == 'harga' || Request::segment(1) == 'potongan' || Request::segment(1) == 'pkp' || Request::segment(1) == 'detailgaji' || Request::segment(1) == 'absensi' || Request::segment(1) == 'tunjangan' || Request::segment(1) == 'lembur' || Request::segment(1) == 'penilaian' || Request::segment(1) == 'pph' || Request::segment(1) == 'supportticket' || Request::segment(1) == 'ticketreply' || Request::segment(1) == 'agenda' || Request::segment(1) == 'pph42' || Request::segment(1) == 'gaji' || Request::segment(1) == 'sewa' || Request::segment(1) == 'ppn' || Request::segment(1) == 'status' ) ? 'in' : '' }}" id="master">

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


      <!--harga-->
      <li class="{{ cek_link('harga') }}">
        <a href="{{ route('harga.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Harga
        </a>
      </li>
      <!-- /harga-->		  
	  

	  

      <!--potongan-->
      <li class="{{ cek_link('potongan') }}">
        <a href="{{ route('potongan.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Potongan
        </a>
      </li>
      <!-- /potongan-->		
	  


      <!--pkp-->
      <li class="{{ cek_link('pkp') }}">
        <a href="{{ route('pkp.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Pkp
        </a>
      </li>
      <!-- /pkp-->		

	  


      <!--detail gaji-->
      <li class="{{ cek_link('detailgaji') }}">
        <a href="{{ route('detailgaji.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Detail Gaji
        </a>
      </li>
      <!-- /detail gaji-->		


    <!--absensi-->
      <li class="{{ cek_link('absensi') }}">
        <a href="{{ route('absensi.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Absensi
        </a>
      </li>
    <!-- /absensi-->		


	
	
    <!--tunjangan-->
      <li class="{{ cek_link('tunjangan') }}">
        <a href="{{ route('tunjangan.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Tunjangan
        </a>
      </li>
    <!-- /tunjangan-->		
	
	

  <!--Lembur-->
      <li class="{{ cek_link('lembur') }}">
        <a href="{{ route('lembur.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Lembur
        </a>
      </li>
  <!-- /Lembur-->		
	



  <!--Penilaian-->
      <li class="{{ cek_link('penilaian') }}">
        <a href="{{ route('penilaian.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Penilaian
        </a>
      </li>
  <!-- /Penilain-->		



  <!--pph-->
      <li class="{{ cek_link('pph') }}">
        <a href="{{ route('pph.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Pph
        </a>
      </li>
  <!-- /pph-->		





  <!--support ticket-->
      <li class="{{ cek_link('supportticket') }}">
        <a href="{{ route('supportticket.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Support ticket
        </a>
      </li>
  <!-- /support ticket-->		



  <!--ticket reply-->
      <li class="{{ cek_link('ticketreply') }}">
        <a href="{{ route('ticketreply.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Ticket Reply
        </a>
      </li>
  <!-- /ticket reply-->		



  
  <!--agenda-->
      <li class="{{ cek_link('agenda') }}">
        <a href="{{ route('agenda.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Agenda
        </a>
      </li>
  <!-- /agenda-->		
  




  <!--pph42-->
      <li class="{{ cek_link('pph42') }}">
        <a href="{{ route('pph42.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Pph42
        </a>
      </li>
  <!-- /pph42-->		


  <!--gaji-->
      <li class="{{ cek_link('gaji') }}">
        <a href="{{ route('gaji.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Gaji
        </a>
      </li>
  <!-- /gaji-->		




  <!-- sewa -->
      <li class="{{ cek_link('sewa') }}">
        <a href="{{ route('sewa.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Sewa
        </a>
      </li>
  <!-- /sewa-->		
  
 


  <!-- ppn -->
      <li class="{{ cek_link('ppn') }}">
        <a href="{{ route('ppn.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Ppn
        </a>
      </li>
  <!-- /ppn-->		


   <!-- status -->
      <li class="{{ cek_link('status') }}">
        <a href="{{ route('status.index') }}">
          <img src="{{ asset('foto/perusahaan.png') }}" align="absmiddle" width=20 height=20> Status
        </a>
      </li>
  <!-- /status-->		
  
  
	  
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

      <li class="#">
        <a href="#">
          <img src="{{ asset('foto/modul.png') }}" align="absmiddle" width=25 height=25> Module 1
        </a>
      </li>

      <li class="#">
        <a href="#">
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