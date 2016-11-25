<?php 

class CreditoModel{

    function addCredito($pagos){
        $db = new Conexion();
        $cabecera="";
        $values="";
        $cont=0;
        foreach($_POST as $key=>$value){
            if($key!="1" && $key!="id2" && $key!="id"){
                if($cont==0){
                    $cabecera .= $key;
                    $values .= "'" . $value . "'";
                    $cont=1;
                }else{
                    $cabecera .= "," . $key;
                    $values .= ",'" . $value . "'";
                }
            }
        }

        $cabecera .= ",ftermino";
        $values .= ",'" . $pagos[$_POST["tiempoPago"]]["fechaDePago"] . "'";
        
        $res1 = $db->query("INSERT INTO credito(" . $cabecera . ") values(" . $values . ")");

        $lastId=$db->insert_id;


        foreach($pagos as $_Pagos){
            $cabeceraP="";
            $valuesP="";
            $contP=0;
            foreach($_Pagos as $key=>$value){
                if($contP==0){
                    $cabeceraP .= $key;
                    $valuesP .= "'" . $value . "'";
                    $contP=1;
                }else{
                    $cabeceraP .= "," . $key;
                    $valuesP .= ",'" . $value . "'";
                }
            }

            $res2 = $db->query("INSERT INTO pagos(" . $cabeceraP . ", idcredito) values(" . $valuesP . ",'" . $lastId . "')");
        }
        
        if(!$res1 && !$res2){
            echo "2";
        }else{
            echo "1";
        }

        $db->close();

    }

    
    
    function deleteCredito($idE){
        $db = new Conexion();
        $res1 = $db->query("DELETE FROM credito WHERE nocredito=" . $idE);


        if(!$res1){
            echo "2";
        }else{
            echo "1";
        }
        $db->close();

    }

    function getListCredito(){
        $db = new Conexion();
        $res1 = $db->query("SELECT credito.nocredito,credito.fapertura,credito.ftermino,credito.fprimerpago,credito.estatus,credito.monto,subcuenta.nombre as NameCuenta,CONCAT(cliente.nombre , ' ',cliente.apellido_pat , ' ', cliente.apellido_mat ) as NameCliente,credito.porcentaje_interes FROM credito 
        LEFT JOIN cliente ON credito.idcliente = cliente.idcliente
        LEFT JOIN subcuenta ON credito.idsubcuenta= subcuenta.idsubcuenta;");       
        $db->close();
        return $res1;
    }

    function getListPagos($id){
        $db = new Conexion();
        $res1 = $db->query("SELECT * FROM pagos WHERE idcredito=".$id);       
        $db->close();
        return $res1;
    }

    function realizarPago($id, $valor, $idCredito){
        $db = new Conexion();
        $res1 = $db->query("UPDATE pagos SET estatus='" . $valor . "', fechaPagado=NOW() WHERE idpagos=".$id);   
        if(!$res1){
            echo "2";
        }else{
            echo "1";
        }    
        $db->close();

    }

    function updatePagos($id, $fecha){
        $db = new Conexion();
        $res1 = $db->query("UPDATE pagos SET fechaPagado='" . $fecha . "' WHERE idpagos=".$id);   
           
        $db->close();
    }

    function getCredito($id){
        $db = new Conexion();

        $res1 = $db->query("SELECT * FROM credito WHERE nocredito=" . $id); 

        $CreditoModel = $db->recorrer($res1);
        $db->close();
        return $CreditoModel;
    }

    function updateCredito($pagos,$id){
        $db = new Conexion();
        $cont=0;
        $values="";
        foreach($_POST as $key=>$value){
            if($key!="1" && $key!="id2" && $key!="id"){
                if($cont==0){
                    $values .= $key . "='" . $value . "'";
                    $cont=1;
                }else{
                    $values .= ", " . $key . "='" . $value . "'";
                }
            }
        }

        $res1 = $db->query("update credito set " . $values . " WHERE nocredito=" . $id);        

        $res1 = $db->query("DELETE FROM pagos where idcredito=" . $id);        
        
        foreach($pagos as $_Pagos){
            $cabeceraP="";
            $valuesP="";
            $contP=0;
            foreach($_Pagos as $key=>$value){
                if($contP==0){
                    $cabeceraP .= $key;
                    $valuesP .= "'" . $value . "'";
                    $contP=1;
                }else{
                    $cabeceraP .= "," . $key;
                    $valuesP .= ",'" . $value . "'";
                }
            }

            $res2 = $db->query("INSERT INTO pagos(" . $cabeceraP . ", idcredito) values(" . $valuesP . ",'" . $id . "')");
        }

        if(!$res1){
            echo "2";
        }else{
            $this->getAdd();
        }

        $db->close();
    }

    function getAdd(){
        $this->getListCredito();
        include(HTML_DIR . 'Vistas/Creditos/Add.php');
    }

    function getInfoFondeadores(){
        $db = new Conexion();
        $InfoFondeadores = $db->query("select 
                a.idfondeador, a.nombre as fondeador, sum(a.cantinvert) as inversion, sum((CASE WHen c.monto is null THEN 0 ELSE c.monto END)) as usado 
            from 
                fondeador a 
            left outer join 
                subcuenta b on b.idfondeador=a.idfondeador 
            left outer join 
                credito c on b.idsubcuenta=c.idsubcuenta
            group by 
            a.idfondeador, a.nombre");       
        $db->close();
        return $InfoFondeadores;
    }

    function getAcesor($id){
        $db = new Conexion();
        $idusuario = $db->query("SELECT b.idusuario FROM cliente a INNER JOIN Usuario b ON a.gestor=b.idempleado WHERE a.idcliente=".$id);     
        $idusuario = $db->recorrer($idusuario);  
        $db->close();
        return $idusuario;
    }

}

/*addUser();*/
?>