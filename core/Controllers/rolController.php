<?php
require('core/Models/rolModel.php');

class rolController{
    var $rolModel;
    public function __construct() {
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    $Usuarios=$rolModel->getEmpleados();
                    include(HTML_DIR . 'Vistas/FondeadorAdd.php');
                    break;
                default:
                    $rolModel = new rolModel();
                    $roles=$rolModel->getList();
                    include(HTML_DIR . 'Vistas/rol.php');
                    break;
            }
        }
        
      }
    
    function AddFondeador(){
        $db = new Conexion();
        $rolModel = new rolModel();
        $Fondeador=$rolModel->getList();
        include(HTML_DIR . 'Vistas/Fondeador/Add.php');
        $db->close();
    }

    function UpdateRol(){
        $db = new Conexion();
        $rolModel = new rolModel();
        $rol=$rolModel->getRol($_POST["id"]);
        $permisos=$rolModel->getPermiso($rol["idrol"]);
        include(HTML_DIR . 'Vistas/Rol/Update.php');
        $db->close();
    }

    function ListRol(){
        $db = new Conexion();
        $rolModel = new rolModel();
        $Fondeador=$rolModel->getList();
        include(HTML_DIR . 'Vistas/Fondeador/List.php');
        $db->close();
    }

}
//$db->close();
$rolController = new rolController();
?>