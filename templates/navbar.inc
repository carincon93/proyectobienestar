<nav class="navbar navbar-fixed-top navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="logo-container" href="<?= $base_url?>index.php"><figure class="logo"></figure></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown-bd">
          <a href=""  aria-haspopup="true" aria-expanded="false">x <span class="caret"></span></a>
        </li>
      </ul>
      <form  class="navbar-form navbar-left">
        <div class="form-group">
          <input  class="form-control" placeholder="Número de documento" id="search" name="search" autocomplete="off"><i class="material-icons">search</i>
          <ul id="resultSearch"></ul>
        </div>
        
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="text-center" href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= strtoupper($_SESSION['unombres'].' '.$_SESSION['uapellidos']) ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
			<li><a class="text-center" href="<?= $base_url ?>exit.php">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="search-box">
	<div class="container">
		<div class="row box-container">
			<div class="col-md-6 search-boxes">
				
			</div>
			<div class="col-md-4 col-md-offset-2">
				
					
			</div>
		</div>
	</div>
</div>
