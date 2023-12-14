<?php

require_once '../class/vehiculos.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $vehiculo = new Vehiculo($_POST['placa'], $_POST['marca'], $_POST['modelo'], $_POST['altura'], $_POST['ancho'], '', $_POST['id_tipoVehiculo'], $_POST['id']);
        $vehiculo->guardar();
    } else {
        // Estás insertando un nuevo vehiculo
        $vehiculo = new Vehiculo($_POST['placa'], $_POST['marca'], $_POST['modelo'], $_POST['altura'], $_POST['ancho'], $_POST['id_cliente'], $_POST['id_tipoVehiculo']);
        $vehiculo -> guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../views/mostrarVehiculos.php");
    exit(); // Asegura que el script se detenga después de la redirección
?>
