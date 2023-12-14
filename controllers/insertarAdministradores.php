<?php

require_once '../class/administradores.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $Administrador = new Administrador($_POST['nombre'], $_POST['apellido'], '', '', $_POST['clave'], $_POST['id']);
        $Administrador->guardar();
    } else {
        // Estás insertando un nuevo administrador
        $Administrador = new Administrador($_POST['nombre'], $_POST['apellido'], $_POST['documento'], $_POST['usuario'], $_POST['clave']);
        $Administrador->guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../pages/menupriadmin.html");
    exit(); // Asegura que el script se detenga después de la redirección
?>