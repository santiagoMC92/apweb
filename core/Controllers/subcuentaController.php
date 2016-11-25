<?php
require('core/Models/subcuentaModel.php');
require('core/Models/fondeadorModel.php');

class subcuentaController{
    var $SubcuentaModel;
    public function __construct() {
        $SubcuentaModel = new SubcuentaModel();
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    $Usuarios=$SubcuentaModel->getEmpleados();
                    include(HTML_DIR . 'Vistas/SubcuentaAdd.php');
                    break;
                default:
                    $fondeadorModel = new fondeadorModel();
                    $fondedores=$fondeadorModel->getList();
                    $Subcuenta=$SubcuentaModel->getList();
                    include(HTML_DIR . 'Vistas/subcuenta.php');
                    break;
            }
        }
        
      }
    
    function AddSubcuenta(){
        $db = new Conexion();
        $SubcuentaModel = new SubcuentaModel();
        $fondeadorModel = new fondeadorModel();
        $Gestores=$fondeadorModel->getList();
        $Subcuentas=$SubcuentaModel->getList();
        include(HTML_DIR . 'Vistas/Subcuenta/Add.php');
        $db->close();
    }

    function UpdateSubcuenta(){
        $db = new Conexion();
        $SubcuentaModel = new SubcuentaModel();
        $fondeadorModel = new fondeadorModel();
        $Subcuenta=$SubcuentaModel->getSubcuenta($_POST["id"]);
        $fondedores=$fondeadorModel->getList();
        include(HTML_DIR . 'Vistas/Subcuenta/Update.php');
        $db->close();
    }

    function ListSubcuenta(){
        $db = new Conexion();
        $SubcuentaModel = new SubcuentaModel();
        $Subcuenta=$SubcuentaModel->getList();
        include(HTML_DIR . 'Vistas/Subcuenta/List.php');
        $db->close();
    }

}
//$db->close();
$subcuentaController = new subcuentaController();
?>