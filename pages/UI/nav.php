  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>CG</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="dist/img/logo.jpg" width="120px" height="50px"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="">
            <a href="#" onclick="cerrar()" class="" data-toggle="">
              Cerrar Session
            </a>
           
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel" style="height: 30px;">
        <div class="pull-left info">
          <p style="height: 49px"><?= $_SESSION['nombre'] ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?= $_SESSION['rol'] ?></a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <?php if(in_array("credito", $_SESSION['permiso'])){ ?>
        <li class="treeview <?= ($_GET["v"]=="credito") ? "active" : "" ?>">
          <a href="?v=credito"><i class="fa fa-circle-o"></i> Credito </a>
        </li>
        <?php } if(in_array("rol", $_SESSION['permiso'])){?>
        <li class="treeview <?= ($_GET["v"]=="rol") ? "active" : "" ?>">
          <a href="?v=rol"><i class="fa fa-circle-o"></i> Roles </a>
        </li>
        <?php } if(in_array("user", $_SESSION['permiso'])){ ?>
        <li class="treeview <?= ($_GET["v"]=="user") ? "active" : "" ?>">
          <a href="?v=user"><i class="fa fa-circle-o"></i> Usuarios </a>
        </li>
        <?php } if(in_array("clientes", $_SESSION['permiso'])){ ?>
        <li class="treeview <?= ($_GET["v"]=="clientes") ? "active" : "" ?>">
          <a href="?v=clientes"><i class="fa fa-circle-o"></i> Clientes </a>
        </li>
        <?php } if(in_array("fondeador", $_SESSION['permiso'])){ ?>
        <li class="treeview <?= ($_GET["v"]=="fondeador") ? "active" : "" ?>">
          <a href="?v=fondeador"><i class="fa fa-circle-o"></i> Fondeadores </a>
        </li>
        <?php } if(in_array("subcuenta", $_SESSION['permiso'])){ ?>
        <li class="treeview <?= ($_GET["v"]=="subcuenta") ? "active" : "" ?>">
          <a href="?v=subcuenta"><i class="fa fa-circle-o"></i> Subcuenta </a>
        </li>
        <?php } ?>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>