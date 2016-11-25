<?php 

class rolModel{

	function getList(){
		$db = new Conexion();
		$res1 = $db->query("SELECT * FROM rol a ");	
		$db->close();
		return $res1;
	}

	function add(){
        //print_r($_POST);
		$db = new Conexion();
		$cabecera="";
		$values="";
		$cont=0;

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
        
        $res1 = $db->query("INSERT INTO rol(" . $cabecera . ") VALUES(" . $values . ")");
		$lastId=$db->insert_id;
		if(!$res1){
			echo "0";
		}else{
			echo $db->insert_id;
		}
		$db->close();
		
	}

	function permiso(){
		$db = new Conexion();
        
        if($_GET["action"]=="0"){
	        $res1 = $db->query("INSERT INTO permiso(modulo, seccion, nivel, idrol) VALUES('" . $_GET["modulo"] . "', '" . $_GET["seccion"] . "', '" . $_GET["nivel"] . "', '" . $_GET["idrol"] . "')");		
			echo $res1 + "<br>";
			echo "INSERT INTO permiso(modulo, seccion, nivel, idrol) VALUES('" . $_GET["modulo"] . "', '" . $_GET["seccion"] . "', '" . $_GET["nivel"] . "', '" . $_GET["idrol"] . "')";
		}else{
			$res1 = $db->query("DELETE FROM permiso where modulo='" . $_GET["modulo"] . "' and seccion='" . $_GET["seccion"] . "' and idrol='" . $_GET["idrol"] . "'");	
			echo "DELETE FROM permiso where modulo='" . $_GET["modulo"] . "' and seccion='" . $_GET["seccion"] . "' and idrol='" . $_GET["idrol"] . "'";
		}
		$db->close();
	}

	function getRol($id){
		$db = new Conexion();
        
        $res1 = $db->query("select * from rol where idrol=" . $id);		
		$rol = $db->recorrer($res1);
		$db->close();
		return $rol;
	}

	function getPermiso($idrol){
		$db = new Conexion();
        
        $Permiso = $db->query("select * from permiso where idrol=" . $idrol);	
        $permisos=null;
        $i=0;
        $j=0;

        $permisos["user"]=array("1"=>"1");
        $permisos["credito"]=array("1"=>"1");
        $permisos["clientes"]=array("1"=>"1");
        $permisos["fondeador"]=array("1"=>"1");
        $permisos["subcuenta"]=array("1"=>"1");
        $permisos["rol"]=array("1"=>"1");
        if($db->rows($Permiso)>0){
	        foreach($Permiso as $_P){
		      $i++;
		      if($_P["nivel"]=="0"){
		        $permisos[$i]=$_P["modulo"];
		      }else{
		        $j++;
		        $permisos[$_P["modulo"]][$j]=$_P["seccion"];
		      }
		    }	
		}else{

		}
		
		$db->close();
		return $permisos;
	}

}

/*addUser();*/
?>