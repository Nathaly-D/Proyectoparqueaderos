<?php

require_once '../class/parqueos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    // Validar y obtener el id del administrador a eliminar
    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id) {
        // Crear una instancia de Administrador solo con el id
        $parqueo = new Parqueo('', '', '', '', '', $id);
        $parqueo->eliminar();

        // Redirigir a alguna página después de eliminar
        header("Location: ../views/mostrarParqueos.php");
        exit();
    }
}

// Manejar caso incorrecto o redirigir a una página de error
header("Location: ../views/error.php");
exit();