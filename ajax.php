<?php
 require('core/core.php');

if($_POST) {
   
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'login':
            require('core/Models/goLogin.php');
            break;
        case 'reg':
            require('core/Models/goReg.php');
            break;
        case 'lostpass':
            require('core/Models/goLostpass.php');
            break;
        case 'addUser':
            require('core/Models/userModel.php');
            $user = new User();
            $user->addUser();
            break;
        case 'addClientes':
            require('core/Models/clientesModel.php');
            $clientesModel = new clientesModel();
            $clientesModel->add();
            break;
        case 'updateUser':
            require('core/Models/userModel.php');
            $user = new User();
            $user->updateUser($_POST["id"]);
            break;
        case 'updateClientes':
            require('core/Models/clientesModel.php');
            $ClientesModel = new ClientesModel();
            $ClientesModel->updateCliente($_POST["id"]);
            break;
        case 'curp':
            require('core/Models/clientesModel.php');
            $ClientesModel = new ClientesModel();
            $ClientesModel->getCurp($_POST["id"]);
            break;
        case 'deleteClientes':
            require('core/Models/clientesModel.php');
            $clientesModel = new ClientesModel();
            $clientesModel->deleteCliente($_POST["id"]);
            break;
        case 'deleteUser':
            require('core/Models/userModel.php');
            $user = new User();
            $user->deleteUser($_POST["id"]);
            break;
        case 'addFondeador':
            require('core/Models/fondeadorModel.php');
            $fondeadorModel = new fondeadorModel();
            $fondeadorModel->add();
            break;
        case 'updateFondeador':
            require('core/Models/fondeadorModel.php');
            $fondeadorModel = new fondeadorModel();
            $fondeadorModel->updateFondeador($_POST["id"]);
            break;
        case 'deleteFondeador':
            require('core/Models/fondeadorModel.php');
            $fondeadorModel = new fondeadorModel();
            $fondeadorModel->deleteFondeador($_POST["id"]);
            break;
        case 'addSubcuenta':
            require('core/Models/subcuentaModel.php');
            $SubcuentaModel = new SubcuentaModel();
            $SubcuentaModel->add();
            break;
        case 'updateSubcuenta':
            require('core/Models/subcuentaModel.php');
            $subcuentaModel = new subcuentaModel();
            $subcuentaModel->updateSubcuenta($_POST["id"]);
            break;
        case 'deleteSubcuenta':
            require('core/Models/subcuentaModel.php');
            $subcuentaModel = new subcuentaModel();
            $subcuentaModel->deleteSubcuenta($_POST["id"]);
            break;
        case 'addCredito':
            require('core/Controllers/creditoController.php');
            //$creditoModel = new CreditoModel();
            $creditoController->AddCredito();
            break;
        case 'updateCredito':
            require('core/Controllers/creditoController.php');
            //$creditoModel = new CreditoModel();
            $creditoController->update();
            break;
        case 'deleteCredito':
            require('core/Models/creditoModel.php');
            $creditoModel = new CreditoModel();
            $creditoModel->deleteCredito($_POST["id"]);
            break;
        case 'pagos':
            require('core/Controllers/creditoController.php');
            $creditoController->getTablaPagos();
            break;
        case 'pagar':
            require('core/Controllers/creditoController.php');
            $creditoController->getTablaPagar();
            break;
        case 'realizarPago':
            require('core/Controllers/creditoController.php');
            $creditoController->realizarPago();
            break;
        case 'getInteres':
            require('core/Controllers/creditoController.php');
            $creditoController->getInteres();
            break;  
        case 'getComision':
            require('core/Controllers/creditoController.php');
            $creditoController->getComision();
            break;
        case 'Imagen':
            require('core/Controllers/clientesController.php');
            $clientesController->Imagen();
            break; 
        case 'addRol':
            require('core/Models/rolModel.php');
            $rolModel = new rolModel();
            $rolModel->add();
            break;           
        default:
            //header('location: index.php');
            break;
    }
} else {
    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'Imagen':
            require('core/Controllers/clientesController.php');
            $clientesController->Imagen();
            break;    
        case 'DeleteImagen':
            require('core/Controllers/clientesController.php');
            $clientesController->DeleteImagen();
            break;
        case 'acesor':
            require('core/Controllers/creditoController.php');
            $creditoController->getAcesor();
            break;
        case 'cerrar':
            require('core/Controllers/logoutController.php');
            
            break; 
        case 'permiso':
            require('core/Models/rolModel.php');
            $rolModel = new rolModel();
            $rolModel->permiso();
            break;         
        default:
            echo "aqui";
            break;
    }
}

?>
