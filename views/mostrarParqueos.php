<?php

require_once '../class/parqueos.php';
$parqueo = Parqueo::mostrar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>    
    <?php if (empty($parqueo)): ?>
        <p>No hay parqueos registrados.</p>
    <?php else: ?>
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tarifa</th>
                    <th>Hora</th>
                    <th>Fecha</th>
                    <th>Salida</th>
                    <th>Reserva</th>
                    <th>Acciones</th> <!-- Nueva columna para acciones -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parqueo as $item): ?>
                    <tr>
                        <td><?php echo $item['tarifa']; ?></td>
                        <td><?php echo $item['hora']; ?></td>
                        <td><?php echo $item['fecha']; ?></td>
                        <td><?php echo $item['salida']; ?></td>
                        <td><?php echo $item['id_reserva']; ?></td>
                        <td>
                            <!-- Botones de acciones -->
                            <button onclick="editarParqueo(<?php echo $item['id']; ?>)">Editar</button>
                            <button id="btnEliminar" onclick="eliminarParqueo(<?php echo $item['id']; ?>)">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <button class="btn" onclick="window.location.href='../pages/menupriadmin.html'">Inicio</button>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="../assets/scripts/datatable.js"></script>
    <script src="../assets/scripts/accionesParqueo.js"></script>
</body>
</html>