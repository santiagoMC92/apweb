<?php
require('core/core.php');

if(!isset($_SESSION['permiso']["user"])){
                      $_SESSION['permiso']["user"]="";
                      }
                      if(!isset($_SESSION['permiso']["clientes"])){
                      $_SESSION['permiso']["clientes"]=array(1=>"1");
                      }
                      if(!isset($_SESSION['permiso']["credito"])){
                      $_SESSION['permiso']["credito"]=array(1=>"1");
                      }
                      if(!isset($_SESSION['permiso']["fondeador"])){
                      $_SESSION['permiso']["fondeador"]=array(1=>"1");
                      }
                      if(!isset($_SESSION['permiso']["subcuenta"])){
                      $_SESSION['permiso']["subcuenta"]=array(1=>"1");
                      }
                      if(!isset($_SESSION['permiso']["rol"])){
                      $_SESSION['permiso']["rol"]=array(1=>"1");
                      }

if(isset($_SESSION["app_id"])){
	if(isset($_GET["v"]) && in_array($_GET["v"], $_SESSION['permiso'])){
		if(file_exists('core/Controllers/' . strtolower($_GET["v"]) . 'Controller.php') && $_GET["v"] != 'index') {
			include('core/Controllers/' . strtolower($_GET["v"]) . 'Controller.php');
			echo "1";
		} else {
			echo "2";
		}	
	}else{
		include('core/Controllers/perfilController.php');
		echo "3";
	}
}else{
	include('core/Controllers/indexController.php');
	echo "6";
}

  

?>
