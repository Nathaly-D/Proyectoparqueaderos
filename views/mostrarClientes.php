<?php

require_once '../class/clientes.php';
$cliente = Cliente::mostrar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>    
    <?php if (empty($cliente)): ?>
        <p>No hay clientes registrados.</p>
    <?php else: ?>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Usuario</th>
                    <th>Teléfono</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cliente as $item): ?>
                    <tr>
                        <td><?php echo $item['nombre']; ?></td>
                        <td><?php echo $item['apellido']; ?></td>
                        <td><?php echo $item['documento']; ?></td>
                        <td><?php echo $item['usuario']; ?></td>
                        <td><?php echo $item['telefono']; ?></td>
                        <td>
                            <!-- Botones de acciones -->
                            <button onclick="editarCliente(<?php echo $item['id']; ?>)">Editar</button>
                            <button id="btnEliminar" onclick="eliminarCliente(<?php echo $item['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../assets/scripts/datatable.js"></script>
    <script src="../assets/scripts/accionesCliente.js"></script>
</body>
</html>