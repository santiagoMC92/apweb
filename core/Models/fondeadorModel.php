<?php 

class fondeadorModel{

	function add($pagos){
        //print_r($_POST);
		$db = new Conexion();
		$cabecera="";
		$values="";
		$cont=0;

        //$res1 = $db->query("INSERT INTO empleado(nombre, apellido_pat, apellido_mat, direccion, celular, telefono, correo, otro) values('" . $_POST['nombre'] .  "', '" . $_POST['apellido_pat'] .  "', '" . $_POST['apellido_mat'] .  "', '" . $_POST['direccion'] .  "', '" . $_POST['celular'] .  "', '" . $_POST['telefono'] .  "', '" . $_POST['correo'] .  "', '" . $_POST['otro'] .  "')");
        foreach($_POST as $key=>$value){
        	if($key!="1"){
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
        
        $res1 = $db->query("INSERT INTO fondeador(" . $cabecera . ") VALUES(" . $values . ")");
		
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

            $res2 = $db->query("INSERT INTO pagosF(" . $cabeceraP . ", idFondeador) values(" . $valuesP . ",'" . $lastId . "')");
        }

		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	function deleteFondeador($id){
		$db = new Conexion();
        $res1 = $db->query("DELETE FROM fondeador WHERE idfondeador=" . $id);
		
		
		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	public function getList(){
		$db = new Conexion();
		$res1 = $db->query("select * from fondeador");		
		$db->close();
		return $res1;
	}

	function getFondeador($id){
		$db = new Conexion();
        
        $res1 = $db->query("select * from fondeador where idfondeador=" . $id);		
		$UsuarioU = $db->recorrer($res1);
		$db->close();
		return $UsuarioU;
	}
    
    function updateFondeador($id){
        $db = new Conexion();
        $cont=0;
        $values="";
        foreach($_POST as $key=>$value){
        	if($key!="1" && $key!="id"){
	        	if($cont==0){
	        		$values .= $key . "='" . $value . "'";
	        		$cont=1;
	        	}else{
	        		$values .= ", " . $key . "='" . $value . "'";
	        	}
	        }
        }
        //echo "update Fondeador set " . $values . " where idFondeador=" . $id;
        $res1 = $db->query("update fondeador set " . $values . " where idfondeador=" . $id);		

        if(!$res1){
			 echo "0";
		}else{
	        $this->getAdd();
		}
        
		$db->close();
    }

    function getListUser(){
		$db = new Conexion();
		$res1 = $db->query("select b.idempleado, a.idusuario, a.usuario, concat(b.nombre, ' ', b.apellido_pat, ' ', b.apellido_mat) as nombre, (CASE WHEN a.rol=1 THEN 'Administrador' ELSE 'Empleado' END) as rol, b.telefono, b.correo, ( CASE WHEN a.estatus=1 THEN 'Activo' ELSE 'Inactivo' END) as estatus from usuario a inner join empleado b on a.idempleado=b.idempleado");		
		$db->close();
		return $res1;
	}


	function getAdd(){
		$this->getListUser();
	    $Fondeadors=$this->getList();
		include(HTML_DIR . 'Vistas/Fondeador/Add.php');
	}

}




/*addUser();*/
?>