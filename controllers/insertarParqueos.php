<?php

require_once '../class/parqueos.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $parqueos = new Parqueo($_POST['tarifa'], $_POST['hora'], $_POST['fecha'], $_POST['salida'], '', $_POST['id']);
        $parqueos->guardar();
    } else {
        // Estás insertando un nuevo parqueos
        $parqueos = new Parqueo($_POST['tarifa'], $_POST['hora'], $_POST['fecha'], $_POST['salida'], $_POST['id_reserva']);
        $parqueos->guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../views/mostrarParqueos.php");
    exit(); // Asegura que el script se detenga después de la redirección
?>