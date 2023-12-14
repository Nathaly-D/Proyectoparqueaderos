<?php

require_once '../class/reservas.php';
$datosReserva = Reserva::obtenerDatosReserva();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>

<body>

    
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Vehiculo</th>
                <th>Parqueadero</th>
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datosReserva as $item): ?>
                <tr>
                    <td><?php echo $item['fecha']; ?></td>
                    <td><?php echo $item['hora']; ?></td>
                    <td><?php echo $item['entrada']; ?></td>
                    <td><?php echo $item['salida']; ?></td>
                    <td><?php echo $item['placa']; ?></td>
                    <td><?php echo $item['nombre_parqueadero']; ?></td>
                    <td>                          
                    <button onclick="editarReserva(<?php echo $item['id']; ?>)">Editar</button>
                    <button id="btnEliminar" onclick="eliminarReserva(<?php echo $item['id']; ?>)">Eliminar</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button class="btn" onclick="window.location.href='../pages/menuprincipal.html'">Inicio</button>
</body>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="../assets/scripts/datatable.js"></script>
<script src="../assets/scripts/accionesReserva.js"></script>

</html>