<?php

require_once '../class/vehiculos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    // Validar y obtener el id del administrador a eliminar
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id) {
        // Crear una instancia de Administrador solo con el id
        $vehiculo = new Vehiculo('', '', '', '', '', '', '', $id);
        $vehiculo->eliminar();

        // Redirigir a alguna página después de eliminar
        header("Location: ../views/mostrarVehiculos.php");
        exit();
    }
}

// Manejar caso incorrecto o redirigir a una página de error
header("Location: ../views/error.php");
exit();