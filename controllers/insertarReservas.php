<?php

require_once '../class/reservas.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $reserva = new Reserva($_POST['fecha'], $_POST['hora'], $_POST['entrada'], $_POST['salida'], $_POST['id_vehiculo'], '', $_POST['id']);
        $reserva->guardar();
    } else {
        // Estás insertando un nuevo reserva
        $reserva = new Reserva($_POST['fecha'], $_POST['hora'], $_POST['entrada'], $_POST['salida'], $_POST['id_vehiculo'], $_POST['id_parqueadero']);
        $reserva->guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../views/mostrarReservas.php");
    exit(); // Asegura que el script se detenga después de la redirección
?>