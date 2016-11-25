<?php
require('core/Models/creditoModel.php');
require('core/Models/userModel.php');

class perfilController{
    var $ClientesModel;
    public function __construct() {
        $db = new Conexion();
        
            switch (isset($_GET['v2']) ? $_GET['v2'] : null) {
                case 'Add':
                    
                    break;
                default:
                    $InfoFondeadores=$this->getInfoFondeadores();
                    include(HTML_DIR . 'Vistas/profile.php');
                    break;
            }
        
        
      }
    
    function getInfoFondeadores(){
        $db = new Conexion();
        $CreditoModel = new CreditoModel();
        $InfoFondeadores=$CreditoModel->getInfoFondeadores();
        $db->close();
        return $InfoFondeadores;
    }

}
//$db->close();

$perfilController = new perfilController();
?>