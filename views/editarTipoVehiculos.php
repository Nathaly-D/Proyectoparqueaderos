<?php
require_once '../class/tipoVehiculos.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehiculoT = Tipo::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$vehiculoT) {
        echo "Tipo de Vehiculo no encontrado.";
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
    <title>Editar Tipo de Vehiculo</title>
</head>
<body>
    <h1>Editar Tipo de vehiculo</h1>
    <form action="../controllers/insertarTipoVehiculos.php" method="post">
        <input type="hidden" name="id" value="<?php echo $vehiculoT['id']; ?>">
        <label for="vehiculoT">Tipo de vehiculo:</label>
        <input type="text" name="vehiculoT" value="<?php echo $vehiculoT['vehiculoT']; ?>" required><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>