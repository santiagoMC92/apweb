<?php 

class ClientesModel{

	function add(){
        //print_r($_POST);
		$db = new Conexion();
		$cabecera="";
		$values="";
		$cont=0;
        //$res1 = $db->query("INSERT INTO empleado(nombre, apellido_pat, apellido_mat, direccion, celular, telefono, correo, otro) values('" . $_POST['nombre'] .  "', '" . $_POST['apellido_pat'] .  "', '" . $_POST['apellido_mat'] .  "', '" . $_POST['direccion'] .  "', '" . $_POST['celular'] .  "', '" . $_POST['telefono'] .  "', '" . $_POST['correo'] .  "', '" . $_POST['otro'] .  "')");
        foreach($_POST as $key=>$value){
        	if($key!="1" && $key!="uploadedfile"){
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
        //echo "INSERT INTO cliente(" . $cabecera . ") VALUES(" . $values . ")";
        $res1 = $db->query("INSERT INTO cliente(" . $cabecera . ") VALUES(" . $values . ")");
		//INSERT INTO nombre, apellido_pat, apellido_mat, rfc, curp, direccion, celular, telefono, teloficina, extencion, correo, otro, estatus, empresa, puesto, gestor
		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	function deleteCliente($id){
		$db = new Conexion();
        $res1 = $db->query("DELETE FROM cliente WHERE idcliente=" . $id);
		
		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	public function getList(){
		$db = new Conexion();
		$res1 = $db->query("select idcliente, concat(nombre, ' ', apellido_pat, ' ', apellido_mat) as nombre, celular, (CASE WHEN estatus=1 THEN 'ACTIVO' ELSE 'INACTIVO' END) as estatus from cliente");		
		$db->close();
		return $res1;
	}

	function getCliente($id){
		$db = new Conexion();
        
        $res1 = $db->query("select * from cliente where idcliente=" . $id);		
		$UsuarioU = $db->recorrer($res1);
		$db->close();
		return $UsuarioU;
	}
    
    function updateCliente($id){
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
        //echo "update cliente set " . $values . " where idcliente=" . $id;
        $res1 = $db->query("update cliente set " . $values . " where idcliente=" . $id);		

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
	    $Clientes=$this->getList();
		include(HTML_DIR . 'Vistas/Clientes/Add.php');
	}


	function getCurp(){
		$db = new Conexion();
        
        $res1 = $db->query("select * from cliente where curp='" . $_POST["curp"] . "'");		
		$UsuarioU = $db->recorrer($res1);
		echo $UsuarioU["idcliente"];
		$db->close();
	}

	function getListIMG($id){
		$db = new Conexion();
		$res1 = $db->query("select * from imagenes where idcliente='" . $id . "'");	
		$db->close();	
		return $res1;
	}

	function DeleteImagen($id){
		$db = new Conexion();
        $res1 = $db->query("DELETE FROM imagenes WHERE idimagenes=" . $id);
		
		
		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
	}

}




/*addUser();*/
?>