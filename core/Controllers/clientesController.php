<?php
require('core/Models/clientesModel.php');
require('core/Models/userModel.php');

class clientesController{
    var $ClientesModel;
    public function __construct() {
        $ClientesModel = new ClientesModel();
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    $Usuarios=$ClientesModel->getEmpleados();
                    include(HTML_DIR . 'Vistas/UserAdd.php');
                    break;
                default:
                    $User = new User();
                    $Gestores=$User->getListUser();
                    $Clientes=$ClientesModel->getList();
                    include(HTML_DIR . 'Vistas/clientes.php');
                    break;
            }
        }
        
      }
    
    function AddCliente(){
        $db = new Conexion();
        
        $ClientesModel = new ClientesModel();
        $User = new User();
        $Gestores=$User->getListUser();
        $Clientes=$ClientesModel->getList();
        include(HTML_DIR . 'Vistas/Clientes/Add.php');
        $db->close();
    }

    function UpdateCliente(){
        $db = new Conexion();
        $ClientesModel = new ClientesModel();
        $User = new User();
        $Cliente=$ClientesModel->getCliente($_POST["id"]);
        $Gestores=$User->getListUser();
        include(HTML_DIR . 'Vistas/Clientes/Update.php');
        $db->close();
    }

    function ListCliente(){
        $db = new Conexion();
        $ClientesModel = new ClientesModel();
        $User = new User();
        $Clientes=$ClientesModel->getList();
        include(HTML_DIR . 'Vistas/Clientes/List.php');
        $db->close();
    }

    function addImagen(){
        $db = new Conexion();
        $ClientesModel = new ClientesModel();
        $User = new User();
        $imagenes=$ClientesModel->getListIMG($_POST["idcliente"]);
        include(HTML_DIR . 'Vistas/Clientes/addImagen.php');
        $db->close();
    }

    function Imagen(){
        $db = new Conexion();

        $descripcion = $_GET['descripcion'];
        $idcliente=$_GET['idcliente'];
        $nombreTEMP=$_FILES['foto']['name'];
        $extencion="." . explode(".", $nombreTEMP);
        $nombre = $_GET['nombre'];
        $nombreArchivo = $_GET['nombre'] . "_" . $_GET['idcliente'] . "_" . date('Y-m-d') . "_" . date('H-i-s').".".end(explode(".", $_FILES['foto']['name']));

        $ruta="upload/".$_GET['idcliente']."/";
        $res1 = $db->query("INSERT INTO imagenes (nombre, ruta, descripcion, idcliente, fecha)VALUES('$nombre', '" . $ruta . $nombreArchivo . "', '$descripcion','$idcliente', now())");
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true);
        }
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta.$nombreArchivo);
        $subida = $db->query("SELECT * FROM imagenes ORDER BY idimagenes DESC LIMIT 1");
        foreach($subida as $subida2){
            echo "<li> 
                    <a href='".$subida2['ruta']."' target='_blank'>
                        <img src='".$subida2['ruta']."' width='128px' height='128px' class='img-subida' title='".$subida2['descripcion']."'>
                    </a>
                    <a class='users-list-name' href='".$subida2['ruta']."'>" . $subida2['nombre'] . "</a>
                      <span class='users-list-date'>" . date("d-m-Y",strtotime($subida2['fecha'])) . "</span>
                <li>";
        }
        $db->close();
    }


    function DeleteImagen(){
        $ClientesModel = new ClientesModel();
        $User = new User();
        $Clientes=$ClientesModel->DeleteImagen($_GET["id"]);
    }
    

}
//$db->close();
$clientesController = new clientesController();
?>