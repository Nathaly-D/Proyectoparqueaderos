<?php

require_once '../class/clientes.php';

    // Verificar si se proporciona un id para editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Estás editando un administrador existente
        $cliente = new Cliente($_POST['nombre'], $_POST['apellido'], '', $_POST['usuario'], $_POST['clave'], $_POST['telefono'], $_POST['id']);
        $cliente->guardar();
    } else {
        // Estás insertando un nuevo cliente
        $cliente = new Cliente($_POST['nombre'], $_POST['apellido'], $_POST['documento'], $_POST['usuario'], $_POST['clave'], $_POST['telefono']);
        $cliente->guardar();
    }

    // Redirige a otra_vista.php
    header("Location: ../views/mostrarClientes.php");
    exit(); // Asegura que el script se detenga después de la redirección
?>

