<?php
require_once '../class/parqueaderos.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $parqueadero = Parqueadero::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$parqueadero) {
        echo "Parqueadero no encontrado.";
        exit();
    }
} else {
    echo "Parámetros incorrectos.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
    <title>Editar parqueadero</title>
</head>
<body>
    <h1>Editar parqueadero</h1>
    <form action="../controllers/insertarParqueaderos.php" method="post">
        <input type="hidden" name="id" value="<?php echo $parqueadero['id']; ?>">
        <label for="nombre_parqueadero">Nombre del Parqueadero:</label>
        <input type="text" name="nombre_parqueadero" value="<?php echo $parqueadero['nombre_parqueadero']; ?>" required><br>

        <label for="ubicacion_parqueadero">Ubicación:</label>
        <input type="text" name="ubicacion_parqueadero" value="<?php echo $parqueadero['ubicacion_parqueadero']; ?>" required><br>

        <label for="cupos_parqueadero">Cupos:</label>
        <input type="number" name="cupos_parqueadero" value="<?php echo $parqueadero['cupos_parqueadero']; ?>" required><br>

        <label for="horario_parqueadero">Horario:</label>
        <input type="text" name="horario_parqueadero" value="<?php echo $parqueadero['horario_parqueadero']; ?>" required><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>