<?php
require('core/Models/creditoModel.php');
require('core/Models/clientesModel.php');
require('core/Models/userModel.php');
require('core/Models/subcuentaModel.php');

class creditoController{
    var $CreditoModel;
    var $ClientesModel;
    var $SubcuentaModel;
    public function __construct() {
        $CreditoModel = new CreditoModel();
        $ClientesModel = new ClientesModel();
        $SubcuentaModel = new SubcuentaModel();
        $User = new User();
        $db = new Conexion();
        if(isset($_GET['v']) || isset($_GET['v2'])){
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    $Creditos=$CreditoModel->getListCredito();
                    include(HTML_DIR . 'Vistas/Creditos/Add.php');
                    break;
                default:
                    $Creditos=$CreditoModel->getListCredito();
                    $Clientes=$ClientesModel->getList();  
                    $Subcuentas=$SubcuentaModel->getList(); 
                    $Usuarios=$User->getListUser();                    
                    include(HTML_DIR . 'Vistas/credito.php');
                    break;
            }
        }
        
      }
    
    /*function AddCredito(){
        $db = new Conexion();
        $CreditoModel = new CreditoModel();
        $Clientes=$ClientesModel->getList();
        include(HTML_DIR . 'Vistas/Creditos/Add.php');
        $db->close();
    }*/

    function AddCredito(){
        $db = new Conexion();
        $CreditoModel = new CreditoModel();
        $pagos=$this->Pagos();
        $CreditoModel->addCredito($pagos);
        
        
        $db->close();
    }

    function update(){
        $pagos=$this->Pagos();
        $CreditoModel = new CreditoModel();
        $CreditoModel->UpdateCredito($pagos, $_POST["id"]);
    }

    function UpdateCredito(){
        $db = new Conexion();
        $CreditoModel = new CreditoModel();
        $ClientesModel = new ClientesModel();
        $SubcuentaModel = new SubcuentaModel();
        $User = new User();
        $Subcuentas=$SubcuentaModel->getList();
        $Clientes=$ClientesModel->getList();    
        $Usuarios=$User->getListUser();    
        $CreditoModel=$CreditoModel->getCredito($_POST["id"]);
        include(HTML_DIR . 'Vistas/Creditos/Update.php');
        $db->close();
    }

    function ListCredito(){
        $db = new Conexion();
        $CreditoModel = new CreditoModel();
        $Creditos=$CreditoModel->getListCredito();
        include(HTML_DIR . 'Vistas/Creditos/List.php');
        $db->close();
    }

    function getTablaPagos(){
        $Pagos=$this->Pagos();
        include(HTML_DIR . 'Vistas/Creditos/tablaPagos.php');
    }

    function getComision(){
        $Comision=$this->comision();
        echo $Comision;
    }

    function getTablaPagar(){
        $CreditoModel = new CreditoModel();
        $Pagos=$CreditoModel->getListPagos($_POST["id"]);
        $p=null;
        $i=0;
        $bandera=0;
        foreach ($Pagos as $P) {
            $i++;
            $p[$i]["idpagos"]=$P["idpagos"];
            $p[$i]["NumPago"]=$P["NumPago"];
            $p[$i]["fechaDePago"]=$P["fechaDePago"];
            $p[$i]["fechaPagado"]=$P["fechaPagado"];
            $p[$i]["montoInteres"]=$P["montoInteres"];
            if($P["estatus"]=="0" && ((strtotime($P["fechaDePago"])-strtotime(date('Y-m-d')))/86400)<0 && $bandera==0){
                //$Date=date('y-m-d');
                $Date=date('Y-m-d',strtotime('-2 days', strtotime(date('Y-m-d'))));
                echo "Dia: ".date("Y-m-d");
                $bandera=1;
            }
            if($bandera==1){
                $Date=date('Y-m-d',strtotime('+1 days', strtotime($Date)));
                $CreditoModel->updatePagos($P["idpagos"],$Date);
                $p[$i]["fechaPagado"]=$Date;
            }else{
                $p[$i]["fechaPagado"]=$P["fechaDePago"];
            }

            //echo "Dia: " . (strtotime($P["fechaDePago"])-strtotime(date('y-m-d')))/86400 . "<br>";

            $p[$i]["montoSinInteres"]=$P["montoSinInteres"];
            $p[$i]["IVA"]=$P["IVA"];
            $p[$i]["montoTotal"]=$P["montoTotal"];
            $p[$i]["estatus"]=$P["estatus"];
            $p[$i]["idcredito"]=$P["idcredito"];
        }
        $Pagos=$p;
        include(HTML_DIR . 'Vistas/Creditos/tablaPagos.php');
    }

    function realizarPago(){
        $CreditoModel = new CreditoModel();
        $CreditoModel->realizarPago($_POST["id"], $_POST["value"], $_POST["idCredito"]);
    }

    function comision(){
        $monto=$_POST["monto"];
        $Interes=$monto*($_POST["interes"]/100);
        $InteresUser=0;
        $User = new User();
        $return=$User->getUser($_POST["id"]);
        $Usuarios=$return["U"];
        $InteresUser=$Usuarios["porcentaje_comision"];

        $tipoPago=$_POST["tipoPagos"];
        $tiempoPago=$_POST["tiempoPago"];
        $meses=0;

        if($tipoPago=="1"){
            $meses=$tiempoPago/20;
            
        }if($tipoPago=="2"){
            $meses=$tiempoPago/4;
           
        }if($tipoPago=="3"){
            $meses=$tiempoPago/2;
            
        }if($tipoPago=="4"){
            $meses=$tiempoPago;
        }

        $comision=($Interes*$meses)*($InteresUser/100);

        return $comision;

    }
    function Pagos(){
        $db = new Conexion();
        $variableD=30.4166;
        $meses=0;
        $montoPrestamo=$_POST["monto"];
        $interes=1+($_POST["porcentaje_interes"]/100);
        $tipoPago=$_POST["tipoPagos"];
        $tiempoPago=$_POST["tiempoPago"];
        $FechaPago=$_POST["fprimerpago"];
        $historialPago="";

        $montoInteresG=0;

       

       
        
        
        
        for($i=1;$i<=$tiempoPago;$i++){
            

            if(date("N", strtotime($FechaPago))==6){
                $FechaPago=date('Y-m-d',strtotime('+2 days', strtotime($FechaPago)));
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=$montoPrestamo;
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format($montoPrestamo+$montoInteresG, 2, '.', '');

            }if(date("N", strtotime($FechaPago))==7){
                $FechaPago=date('Y-m-d',strtotime('+1 days', strtotime($FechaPago)));
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=$montoPrestamo;
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format($montoPrestamo+$montoInteresG, 2, '.', '');

            }else{
                $historialPago[$i]["NumPago"]=$i;
                $historialPago[$i]["fechaDePago"]=$FechaPago;
                $historialPago[$i]["montoSinInteres"]=$montoPrestamo;
                $historialPago[$i]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
                $historialPago[$i]["montoTotal"]=number_format($montoPrestamo+$montoInteresG, 2, '.', '');
            }


            if($tipoPago=="1"){
                $FechaPago=date('Y-m-d',strtotime('+1 days', strtotime($FechaPago)));
                
            }if($tipoPago=="2"){
                $FechaPago=date('Y-m-d',strtotime('+1 weeks', strtotime($FechaPago)));
               
            }if($tipoPago=="3"){
                $FechaPago=date('Y-m-d',strtotime('+15 days', strtotime($FechaPago)));
                
            }if($tipoPago=="4"){
                $FechaPago=date('Y-m-d',strtotime('+1 months', strtotime($FechaPago)));
            }

            
            //echo "<br>";
            //setlocale(LC_TIME, 'es_ES.UTF-8');
            //echo date("l", strtotime($FechaPago));
            //echo date("N", strtotime($FechaPago));

        }
        //print_r($historialPago);

        $datetime1 = new DateTime($historialPago[1]["fechaDePago"]); 
        $datetime2 = new DateTime($historialPago[$i-1]["fechaDePago"]); 
        $interval = $datetime1->diff($datetime2); 
        //echo "Diferencia en dias: " . $interval->format('%a');
        $dias=$interval->format('%a');

        $montoInteresG=$montoPrestamo*($interes-1);


        $meses=((1/360)*$dias)*12;
        
        if($tipoPago=="1"){
            $meses=$tiempoPago/20;
            
        }if($tipoPago=="2"){
            $meses=$tiempoPago/4;
           
        }if($tipoPago=="3"){
            $meses=$tiempoPago/2;
            
        }if($tipoPago=="4"){
            $meses=$tiempoPago;
        }

        //echo $meses;
        $montoInteresG=($montoInteresG*$meses)/$tiempoPago;
        
        $montoPrestamo=$montoPrestamo/$tiempoPago;

        $montoIVA=0;
        if($_POST["IVA"]==1){
            $montoIVA=$montoInteresG*0.16;
        }

        for($j=1;$j<=$i-1;$j++){
            $historialPago[$j]["montoSinInteres"]=number_format($montoPrestamo, 2, '.', '');
            $historialPago[$j]["montoInteres"]=number_format($montoInteresG, 2, '.', '');
            $historialPago[$j]["IVA"]=number_format($montoIVA, 2, '.', '');
            $historialPago[$j]["montoTotal"]=number_format($montoPrestamo+$montoInteresG+$montoIVA, 2, '.', '');
        }
       //print_r($historialPago);
        return $historialPago;
    }

    function getinteres(){
        $SubcuentaModel = new SubcuentaModel();
        $Subcuentas=$SubcuentaModel->getSubcuenta($_POST["id"]);
        echo $Subcuentas["porcentajeint"];
    }

    function getAcesor(){
        $CreditoModel = new CreditoModel();
        $acesor=$CreditoModel->getAcesor($_GET["idcliente"]);
        echo $acesor["idusuario"];
    }

}
//$db->close();
$creditoController = new creditoController();
?>