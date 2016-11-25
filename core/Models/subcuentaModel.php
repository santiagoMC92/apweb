<?php 

class SubcuentaModel{

	function add(){
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
        //echo "INSERT INTO subcuenta(" . $cabecera . ") VALUES(" . $values . ")";
        $res1 = $db->query("INSERT INTO subcuenta(" . $cabecera . ") VALUES(" . $values . ")");
		//INSERT INTO nombre, apellido_pat, apellido_mat, rfc, curp, direccion, celular, telefono, teloficina, extencion, correo, otro, estatus, empresa, puesto, gestor
		if(!$res1){
			 echo "0";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	function deleteSubcuenta($id){
		$db = new Conexion();
        $res1 = $db->query("DELETE FROM subcuenta WHERE idsubcuenta=" . $id);
		
		
		if(!$res1){
			echo "2";
		}else{
			echo "1";
		}
		$db->close();
		
	}

	public function getList(){
		$db = new Conexion();
		$res1 = $db->query("select a.*, b.nombre as fondeador from subcuenta a inner join fondeador b on a.idfondeador=b.idfondeador");		
		$db->close();
		return $res1;
	}

	function getSubcuenta($id){
		$db = new Conexion();
        
        $res1 = $db->query("select * from subcuenta where idsubcuenta=" . $id);		
		$Subcuenta = $db->recorrer($res1);
		$db->close();
		return $Subcuenta;
	}
    
    function updateSubcuenta($id){
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
        //echo "update subcuenta set " . $values . " where idsubcuenta=" . $id;
        $res1 = $db->query("update subcuenta set " . $values . " where idsubcuenta=" . $id);		

        if(!$res1){
			echo "2";
		}else{
	        $this->getAdd();
		}
        
		$db->close();
    }

    function getListFondeador(){
		$db = new Conexion();
		$res1 = $db->query("select * from fondeador");		
		$db->close();
		return $res1;
	}

	function getAdd(){
		$fondedores=$this->getListFondeador();
	    $Subcuenta=$this->getList();
		include(HTML_DIR . 'Vistas/Subcuenta/Add.php');
	}

}




/*addUser();*/
?>