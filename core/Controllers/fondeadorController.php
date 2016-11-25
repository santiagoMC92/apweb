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

    function getPagos(){
        $Pagos=$this->Pagos();
        include(HTML_DIR . 'Vistas/Fondeador/tablaPagos.php');
    }

    function Pagos(){
        $db = new Conexion();
        $variableD=30.4166;
        $meses=0;
        $montoPrestamo=$_POST["cantinvert"];
        $interes=($_POST["porcentaje_ganancia"]/100);
        $tiempoPago=$_POST["tiempo_ganancia"];
        $FechaPago=$_POST["fechaEntrega"];
        $historialPago="";

        $montoInteresG=($montoPrestamo*$interes);
        
        
        for($i=1;$i<=$tiempoPago;$i++){
            
            $FechaPago=date('Y-m-d',strtotime('+1 months', strtotime($FechaPago)));

            if(date("N", strtotime($FechaPago))==6){
                $FechaPago=date('Y-m-d',strtotime('+2 days', strtotime($FechaPago)));
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=number_format($montoPrestamo/$tiempoPago, 2, '.', '');
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format(($montoPrestamo/$tiempoPago)+$montoInteresG, 2, '.', '');

            }if(date("N", strtotime($FechaPago))==7){
                $FechaPago=date('Y-m-d',strtotime('+1 days', strtotime($FechaPago)));
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=number_format($montoPrestamo/$tiempoPago, 2, '.', '');
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format(($montoPrestamo/$tiempoPago)+$montoInteresG, 2, '.', '');

            }else{
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=number_format($montoPrestamo/$tiempoPago, 2, '.', '');
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format(($montoPrestamo/$tiempoPago)+$montoInteresG, 2, '.', '');
            }

            

        }
       //print_r($historialPago);
        return $historialPago;
    }



}
//$db->close();
$fondeadorController = new fondeadorController();
?>