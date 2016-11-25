<?php

if(!empty($_POST['user']) and !empty($_POST['pass'])) {
  $db = new Conexion();
  $data = $db->real_escape_string($_POST['user']);
  $pass = Encrypt($_POST['pass']);
 //$pass = $_POST['pass'];
       
  $sql = $db->query("SELECT idUsuario, c.rol as rol, a.rol as idrol, concat(b.nombre, ' ', b.apellido_pat, ' ', b.apellido_mat) as nombre FROM Usuario a inner join empleado b on a.idempleado=b.idempleado inner join rol c on a.rol=c.idrol WHERE  a.usuario='$data' AND a.password='$pass' and a.estatus=1 LIMIT 1;");
  if($db->rows($sql) > 0) {
    if($_POST['sesion']) { ini_set('session.cookie_lifetime', time() + (60*60*24)); }
    //print_r($db->recorrer($sql));
    $usuario=$db->recorrer($sql);
    $_SESSION['app_id'] = $usuario["idUsuario"];
    $_SESSION['nombre'] = $usuario["nombre"];
    $_SESSION['rol'] = $usuario["rol"];
    $_SESSION['time_online'] = time() - (60*6);
    $permisos = $db->query("SELECT * FROM permiso where idrol=" . $usuario["idrol"] . ";");

    $cont=0;
    $cont2=0;
    foreach($permisos as $_P){
      $cont++;
      if($_P["nivel"]=="0"){
        $_SESSION['permiso'][$cont]=$_P["modulo"];
      }else{
        $cont2++;
        $_SESSION['permiso'][$_P["modulo"]][$cont2]=$_P["seccion"];
      }
    }
    echo 1;
  } else {
    echo 0;
  }
  $db->liberar($sql);
  $db->close();
} else {
  
}

?>
