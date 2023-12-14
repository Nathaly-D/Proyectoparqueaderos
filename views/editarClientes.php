<?php
require_once '../class/clientes.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $cliente = Cliente::obtenerPorId($id); // Debes implementar este método en tu clase

    if (!$cliente) {
        echo "Cliente no encontrado.";
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
    <title>Editar cliente</title>
</head>
<body>
    <h1>Editar cliente</h1>
    <form action="../controllers/insertarClientes.php" method="post">
        <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $cliente['nombre']; ?>" required><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" value="<?php echo $cliente['apellido']; ?>" required><br>

        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $cliente['usuario']; ?>" required><br>

        <!-- Otros campos pueden agregarse según sea necesario -->

        <label for="clave">Clave:</label>
        <input type="password" name="clave" value="<?php echo $cliente['clave']; ?>" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="tel" name="telefono" value="<?php echo $cliente['telefono']; ?>" required><br>

        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>