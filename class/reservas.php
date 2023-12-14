<?php

require_once '../config/conexion.php';
require_once 'vehiculos.php';  
require_once 'parqueaderos.php';

class Reserva{
    public $id;
    public $fecha;
    public $hora;
    public $entrada;
    public $salida;
    public $id_vehiculo;
    public $id_parqueadero;

    const TABLA = 'reservas';

    public function getId(){
        return $this->id;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getEntrada(){
        return $this->entrada;
    }

    public function getSalida(){
        return $this->salida;
    }

    public function getId_vehiculo(){
        return $this->id_vehiculo;
    }

    public function getId_parqueadero(){
        return $this->id_parqueadero;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function setEntrada($entrada){
        $this->entrada = $entrada;
    }

    public function setSalida($salida){
        $this->salida = $salida;
    }

    public function setId_vehiculo($id_vehiculo){
        $this->id_vehiculo = $id_vehiculo;
    }

    public function setId_parqueadero($id_parqueadero){
        $this->id_parqueadero = $id_parqueadero;
    }      

    public function __construct($fecha, $hora, $entrada, $salida, $id_vehiculo, $id_parqueadero, $id = null){
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->entrada = $entrada;
        $this->salida = $salida;
        $this->id_vehiculo = $id_vehiculo;;
        $this->id_parqueadero = $id_parqueadero;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            if($this->id){
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET fecha = :fecha, hora = :hora, entrada = :entrada, salida = :salida,
                id_vehiculo = :id_vehiculo WHERE id = :id');

                $consulta->bindParam(':fecha', $this->fecha);
                $consulta->bindParam(':hora', $this->hora);
                $consulta->bindParam(':entrada', $this->entrada);
                $consulta->bindParam(':salida', $this->salida);
                $consulta->bindParam(':id_vehiculo', $this->id_vehiculo);
                $consulta->bindParam(':id', $this->id);

                $consulta->execute();
            }else{
                $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (fecha, hora, entrada, salida, id_vehiculo, id_parqueadero) 
                VALUES (:fecha, :hora, :entrada, :salida, :id_vehiculo, :id_parqueadero)');

                $consulta->bindParam(':fecha', $this->fecha);
                $consulta->bindParam(':hora', $this->hora);
                $consulta->bindParam(':entrada', $this->entrada);
                $consulta->bindParam(':salida', $this->salida);
                $consulta->bindParam(':id_vehiculo', $this->id_vehiculo);
                $consulta->bindParam(':id_parqueadero', $this->id_parqueadero);
            
                $consulta->execute();
            
                $this->id = $conexion->lastInsertId();
            }
        } catch (PDOException $e) {
            // Manejar la excepción (por ejemplo, imprimir el mensaje de error)
            echo "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion -> prepare('SELECT id, fecha, hora, entrada, salida, id_vehiculo, id_parqueadero FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }
    
    public static function obtenerPorId($id) {
        $reservas = self::mostrar();
    
        foreach ($reservas as $reserva) {
            if ($reserva['id'] == $id) {
                return $reserva;
            }
  
        }
    
        return null;
    }


    public function eliminar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
            $consulta->bindParam(':id', $this->id);
            $consulta->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
    }

    public static function obtenerDatosReserva() {
        $reservas = self::mostrar(); // Supongamos que ya tienes un método mostrar en tu clase
        $vehiculos = Vehiculo::mostrar();
        $parqueaderos = Parqueadero::mostrar();

        $datosCompletos = [];

        foreach ($reservas as $reserva) {
            foreach ($vehiculos as $vehiculo) {
                if ($reserva['id_vehiculo'] == $vehiculo['id']) {
                    $reserva['placa'] = $vehiculo['placa'];
                    break; // Si encontramos el vehículo, salimos del bucle interno
                }
            }

            foreach ($parqueaderos as $parqueadero) {
                if ($reserva['id_parqueadero'] == $parqueadero['id']) {
                    $reserva['nombre_parqueadero'] = $parqueadero['nombre_parqueadero'];
                    break; // Si encontramos el parqueadero, salimos del bucle interno
                }
            }

            $datosCompletos[] = $reserva;
        }

        return $datosCompletos;
    }
}
