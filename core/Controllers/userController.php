<?php

/*$db = new Conexion();
switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
	case 'UserAdd':
		include(HTML_DIR . 'Vistas/UserAdd.php');
		break;
	case 'UpdateUser':
		require('core/Models/userModel.php');
		require('core/Models/rolModel.php');
		$user = new User();
		$Rol = new Rol();
      	$UsuarioU=$user->getUser($_GET["v3"]);
      	$Roles=$Rol->getListRol();
		include(HTML_DIR . 'Vistas/Usuarios/UserUpdate.php');
		break;
	default:
		require('core/Models/userModel.php');
		$user = new User();
      	$Usuarios=$user->getListUser();
		include(HTML_DIR . 'Vistas/user.php');
		break;
}
*/
require('core/Models/userModel.php');
require('core/Models/rolModel.php');
class UserC{
    var $user;
    public function __construct() {
        $user = new User();
        $rolModel = new rolModel();
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'UserAdd':
                    include(HTML_DIR . 'Vistas/UserAdd.php');
                    break;
                default:
                    $roles=$rolModel->getList();
                    $Usuarios=$user->getListUser();
                    include(HTML_DIR . 'Vistas/user.php');
                    break;
            }
        }
        
      }
    

    function UpdateUser(){
        $db = new Conexion();
        $user = new User();
        $rolModel = new rolModel();
        
        $return=$user->getUser($_POST["id"]);
        $UsuarioU=$return["U"];
        $roles=$rolModel->getList();
        
        include(HTML_DIR . 'Vistas/Usuarios/Update.php');
        $db->close();
    }

    function ListUser(){
        $db = new Conexion();
        $User = new User();
        $Usuarios=$User->getListUser();
        include(HTML_DIR . 'Vistas/Usuarios/List.php');
        $db->close();
    }
}
//$db->close();
$userC = new UserC();
?>