<?php
if($_POST) {
    require('core/core.php');

    switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
        case 'updateUser':
            require('core/Controllers/userController.php');
            $userC->UpdateUser();
            break;
        case 'ListUser':
            require('core/Controllers/userController.php');
            $userC->ListUser();
            break;
        case 'updateClientes':
            require('core/Controllers/clientesController.php');
            $clientesController->UpdateCliente();
            break;
        case 'ListClientes':
            require('core/Controllers/clientesController.php');
            $clientesController->ListCliente();
            break;
        case 'updateFondeador':
            require('core/Controllers/fondeadorController.php');
            $fondeadorController->Updatefondeador();
            break;
        case 'ListFondeador':
            require('core/Controllers/fondeadorController.php');
            $fondeadorController->ListFondeador();
            break;
        case 'updateSubcuenta':
            require('core/Controllers/subcuentaController.php');
            $subcuentaController->UpdateSubcuenta();
            break;
        case 'ListSubcuenta':
            require('core/Controllers/subcuentaController.php');
            $subcuentaController->ListSubcuenta();
            break;
        case 'updateCredito':
            require('core/Controllers/creditoController.php');
            $creditoController->UpdateCredito();
            break;
        case 'updateRol':
            require('core/Controllers/rolController.php');
            $rolController->UpdateRol();
            break;
        case 'ListCredito':
            require('core/Controllers/creditoController.php');
            $creditoController->ListCredito();
            break; 
        case 'Imagen':
            require('core/Controllers/clientesController.php');
            $clientesController->addImagen();
            break;           
        default:
            //header('location: index.php');
            break;
    }
} else {
    echo "aqui";
}

?>
