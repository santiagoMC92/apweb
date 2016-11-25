<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Credito Global | Creditos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/jquery-ui.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- DATEPICKER PARA NAVEGADORES INCOMPATIBLES -->
  <link rel="stylesheet" type="text/css" href="plugins/jQueryUI/datepicker/jquery-ui.css">
  <script type="text/javascript" src="plugins/jQueryUI/datepicker/jquery-ui.js"></script>    
  <!-- DATEPICKER PARA NAVEGADORES INCOMPATIBLES -->
      
      
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

<?php include(HTML_DIR . 'UI/nav.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
      <div class="container" style="padding-top: 1em;">

        <!-- Pestañas modulo inicio
        --------------------------------------------------- -->
            <div class="well">
                <div class="tabbable ">
                    <ul class="nav nav-tabs">
                        <li class="active" id="Ntab1">
                            <a href="#tab1" data-toggle="tab">Lista</a>
                        </li>
                        <li id="Ntab2">
                          <?php if(in_array("add", $_SESSION['permiso'][$_GET["v"]])){ ?>
                          <a href="#tab2" id="atab2" data-toggle="tab">Agregar</a>
                          <?php } ?>
                        </li>
                    </ul>

                    <div class="tab-content">
                    <div id="_AJAX_LOGIN_"></div>
                        <div class="tab-pane active" id="tab1">
                            
                            
                            <?php include('Creditos/List.php'); ?>
                            
                            
                        </div>
                        <div class="tab-pane" id="tab2">
                            <!-- Tab 1 ABC inicio
                            --------------------------------------------------- -->
                            <br />
                            <div id="add">
                                <?php include('Creditos/Add.php'); ?>
                            </div>
                            
                            <div id="update">
                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

      

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<script src="plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="dist/js/moment.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
    <script src="dist/js/generales.js"></script>
<!-- SlimScroll -->
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
    $("input[name='datepicker']").datepicker({
      dateFormat: 'yy-mm-dd'
    });
    
</script>
    
        <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/modernizr/modernizr-1.7-development-only.js"></script>
        <script type="text/javascript">
            $(function(){
                if(!Modernizr.inputtypes.date) {
                    console.log("The 'date' input type is not supported, so using JQueryUI datepicker instead.");
                    $("#theDate").datepicker();
                }
            });
        </script>
        <script>
  $( function() {
    $( "#fprimerpago" ).datepicker({"format": 'yy-mm-dd' });
  } );
  </script>
    
</body>

