<?php

require_once '../class/tipoVehiculos.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $vehiculoT = new Tipo($_POST['vehiculoT'], $_POST['id']);
        $vehiculoT->guardar();
    } else {
        // Estás insertando un nuevo vehiculoT
        $vehiculoT = new Tipo($_POST['vehiculoT']);
        $vehiculoT -> guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../views/mostrarTipoVehiculos.php");
    exit(); // Asegura que el script se detenga después de la redirección
?>

