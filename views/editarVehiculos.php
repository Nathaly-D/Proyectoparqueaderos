<?php
require_once '../class/vehiculos.php';
require_once '../class/vehiculos.php';

$vehiculosT = Tipo::mostrar();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $vehiculo = Vehiculo::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$vehiculo) {
        echo "vehiculo no encontrado.";
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
    <title>Editar vehiculo</title>
</head>
<body>
    <h1>Editar Vehiculo</h1>
    <form action="../controllers/insertarVehiculos.php" method="post">
        <input type="hidden" name="id" value="<?php echo $vehiculo['id']; ?>">

        <label for="placa">Placa:</label>
        <input type="text" name="placa" value="<?php echo $vehiculo['placa']; ?>" required><br>

        <label for="marca">Marca de vehiculo:</label>
        <input type="text" name="marca" value="<?php echo $vehiculo['marca']; ?>" required><br>
        
        <label for="modelo">modelo de vehiculo:</label>
        <input type="text" name="modelo" value="<?php echo $vehiculo['modelo']; ?>" required><br>

        <label for="altura">altura de vehiculo:</label>
        <input type="text" name="altura" value="<?php echo $vehiculo['altura']; ?>" required><br>

        <label for="ancho">ancho de vehiculo:</label>
        <input type="text" name="ancho" value="<?php echo $vehiculo['ancho']; ?>" required><br>

        <label for="id_tipoVehiculo">Tipo de Vehiculo:</label>
        <select id="id_tipoVehiculo" name="id_tipoVehiculo" required>
        <?php
        foreach ($vehiculosT as $vehiculoT) {
            echo "<option value='" . $vehiculoT['id'] . "'>" . $vehiculoT['vehiculoT'] . "</option>";
        }
        ?>
        </select><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>