<?php 

session_start();

#Constantes de conexión
define('DB_HOST','127.0.0.1');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','apweb');
define('HTML_DIR','pages/');
define('PATH_COMPLEMENTO','');


require('core/Models/class.Conexion.php');
require('core/Models/Encrypt.php');

?>