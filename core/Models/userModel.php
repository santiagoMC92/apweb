<?php 

class User{

	function addUser(){
        
		$db = new Conexion();
        
        $res1 = $db->query("INSERT INTO empleado(nombre, apellido_pat, apellido_mat, direccion, celular, telefono, correo, otro,porcentaje_comision) values('" . $_POST['nombre'] .  "', '" . $_POST['apellido_pat'] .  "', '" . $_POST['apellido_mat'] .  "', '" . $_POST['direccion'] .  "', '" . $_POST['celular'] .  "', '" . $_POST['telefono'] .  "', '" . $_POST['correo'] .  "', '" . $_POST['otro'] .  "', " . $_POST['porcentaje_comision'] . ")");

		
		$lastId=$db->insert_id;
        
        $res2 = $db->query("INSERT INTO Usuario (usuario, password, estatus, rol, idempleado) VALUES('" . $_POST['user'] .  "',md5('" . $_POST['password'] .  "'), '" . $_POST["estatus"] . "', '" . $_POST["rol"] . "', '" . $lastId .  "')");
		$lastId=$db->insert_id;
		if(!$res1 || !$res2){
			echo "0";
		}else{
			echo $lastId;
		}
		$db->close();
		
	}

	function deleteUser($idE){
		$db = new Conexion();
        $res2 = $db->query("DELETE FROM Usuario WHERE idempleado=" . $idE);
		$res1 = $db->query("DELETE FROM empleado WHERE  idempleado=" . $idE);
		
		
		if(!$res1 || !$res2){
			echo "2";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	function getListUser(){
		$db = new Conexion();

		$res1 = $db->query("select b.idempleado, a.idusuario, a.usuario, concat(b.nombre, ' ', b.apellido_pat, ' ', b.apellido_mat) as nombre, (CASE WHEN a.rol=1 THEN 'Administrador' ELSE 'Empleado' END) as rol, b.telefono, b.correo, ( CASE WHEN a.estatus=1 THEN 'Activo' ELSE 'Inactivo' END) as estatus, b.porcentaje_comision from Usuario a inner join empleado b on a.idempleado=b.idempleado");		
		$db->close();
		return $res1;
	}

	function getUser($id){
		$db = new Conexion();
        
        $return=null;
        $res1 = $db->query("select * from Usuario a inner join empleado b on a.idempleado=b.idempleado where a.idusuario=" . $id);		
		$UsuarioU = $db->recorrer($res1);

		$return["U"]=$UsuarioU;
		
		
		
		$db->close();
		return $return;
	}
    
    function updateUser($id){
        $db = new Conexion();
        
        $res1 = $db->query("update Usuario set Usuario='" . $_POST["usuario"] . "', estatus='" . $_POST["estatus"] . "', rol='" . $_POST["rol"] . "' where idempleado=" . $id);		
        
        $res2 = $db->query("update empleado set nombre='" . $_POST["nombre"] . "', apellido_pat='" . $_POST["apellido_pat"] ."', apellido_mat='" . $_POST["apellido_mat"] ."', direccion='" . $_POST["direccion"] ."', celular='" . $_POST["celular"] ."', telefono='" . $_POST["telefono"] ."', correo='" . $_POST["correo"] ."', otro='" . $_POST["otro"] ."' , porcentaje_comision=" . $_POST['porcentaje_comision'] . " where idempleado=" . $id);
        
        if(!$res1 || !$res2){
			echo "2";
		}else{
			$this->getAdd();
		}
        
		$db->close();
    }

    function permiso(){
		$db = new Conexion();
        
        if($_GET["action"]=="0"){
	        $res1 = $db->query("INSERT INTO permiso(modulo, seccion, nivel, idusuario) VALUES('" . $_GET["modulo"] . "', '" . $_GET["seccion"] . "', '" . $_GET["nivel"] . "', '" . $_GET["idusuario"] . "')");		
			echo $res1 + "<br>";
			echo "INSERT INTO permiso(modulo, seccion, nivel, idusuario) VALUES('" . $_GET["modulo"] . "', '" . $_GET["seccion"] . "', '" . $_GET["nivel"] . "', '" . $_GET["idusuario"] . "')";
		}else{
			$res1 = $db->query("DELETE FROM permiso where modulo='" . $_GET["modulo"] . "' and seccion='" . $_GET["seccion"] . "' and idusuario='" . $_GET["idusuario"] . "'");	
			echo "DELETE FROM permiso where modulo='" . $_GET["modulo"] . "' and seccion='" . $_GET["seccion"] . "' and idusuario='" . $_GET["idusuario"] . "'";
		}
		$db->close();
	}


    function getAdd(){
        include(HTML_DIR . 'Vistas/Usuarios/Add.php');
    }

}

/*addUser();*/
?>