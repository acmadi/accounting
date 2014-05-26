<!-- navbar  -->
<nav class="navbar navbar-php-id" role="navigation">

  <!-- .container-fluid -->
  <div class="container-fluid">

    <div class="navbar-header">      
      <span class="navbar-brand">
        <a href="{{ route('pengguna.index') }}"><img src="{{ asset('foto/logo.png') }}" align="absmiddle" width=100 height=30></a> <small> </small>
      </span>
    </div>
	
	
	<span class="logout">
		<a href="{{ route('logout') }}" class="logoutmenu"> Logout</a>
	</span>
	<span class="user">
		<a href="#" class="usermenu"> <img src="{{ asset('foto/adminblu.png') }}" width=30 height=30 align="absmiddle" class="gbruser"> &nbsp;user : smartpro </a>
	</span>

  </div>
  <!-- /.container-fluid -->

</nav>
<!-- /.navbar  -->