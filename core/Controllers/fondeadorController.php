<?php
require('core/Models/fondeadorModel.php');
require('core/Models/userModel.php');

class fondeadorController{
    var $fondeadorModel;
    public function __construct() {
        $fondeadorModel = new fondeadorModel();
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    $Usuarios=$fondeadorModel->getEmpleados();
                    include(HTML_DIR . 'Vistas/FondeadorAdd.php');
                    break;
                default:
                    $User = new User();
                    $Gestores=$User->getListUser();
                    $Fondeador=$fondeadorModel->getList();
                    include(HTML_DIR . 'Vistas/fondeador.php');
                    break;
            }
        }
        
      }
    
    function AddFondeador(){
        $db = new Conexion();
        $fondeadorModel = new fondeadorModel();
        $Fondeador=$fondeadorModel->getList();
        include(HTML_DIR . 'Vistas/Fondeador/Add.php');
        $db->close();
    }

    function UpdateFondeador(){
        $db = new Conexion();
        $fondeadorModel = new fondeadorModel();
        $Fondeador=$fondeadorModel->getFondeador($_POST["id"]);
        include(HTML_DIR . 'Vistas/Fondeador/Update.php');
        $db->close();
    }

    function ListFondeador(){
        $db = new Conexion();
        $fondeadorModel = new fondeadorModel();
        $Fondeador=$fondeadorModel->getList();
        include(HTML_DIR . 'Vistas/Fondeador/List.php');
        $db->close();
    }

}
//$db->close();
$fondeadorController = new fondeadorController();
?>