<?php

require_once '../config/conexion.php';
require_once 'administradores.php';

class Parqueadero{
    public $id;
    public $nombre_parqueadero;
    public $ubicacion_parqueadero;
    public $cupos_parqueadero;
    public $horario_parqueadero;
    public $id_administrador;


    const TABLA = 'parqueaderos';

    public function getId(){
        return $this->id;
    }

    public function getNombre_parqueadero(){
        return $this->nombre_parqueadero;
    }

    public function getUbicacion_parqueadero(){
        return $this->ubicacion_parqueadero;
    }

    public function getCupos_parqueadero(){
        return $this->cupos_parqueadero;
    }

    public function getHorario_parqueadero(){
        return $this->horario_parqueadero;
    }
    
    public function getId_administrador(){
        return $this->id_administrador;
    }

    public function setNombre_parqueadero($nombre_parqueadero){
        $this->nombre_parqueadero = $nombre_parqueadero;
    }

    public function setUbicacion_parqueadero($ubicacion_parqueadero){
        $this->ubicacion_parqueadero = $ubicacion_parqueadero;
    }

    public function setCupos_parqueadero($cupos_parqueadero){
        $this->cupos_parqueadero = $cupos_parqueadero;
    }

    public function setHorario_parqueadero($horario_parqueadero){
        $this->horario_parqueadero = $horario_parqueadero;
    }
    
    public function setId_administrador($id_administrador){
        $this->id_administrador = $id_administrador;
    }

    public function __construct($nombre_parqueadero, $ubicacion_parqueadero, $cupos_parqueadero, $horario_parqueadero, $id_administrador, $id = null){
        $this->nombre_parqueadero = $nombre_parqueadero;
        $this->ubicacion_parqueadero = $ubicacion_parqueadero;
        $this->cupos_parqueadero = $cupos_parqueadero;
        $this->horario_parqueadero = $horario_parqueadero;
        $this->id_administrador = $id_administrador;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            if($this->id){
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre_parqueadero = :nombre_parqueadero, 
                ubicacion_parqueadero = :ubicacion_parqueadero, cupos_parqueadero = :cupos_parqueadero, horario_parqueadero = :horario_parqueadero
                WHERE id = :id');

                $consulta->bindParam(':nombre_parqueadero', $this->nombre_parqueadero);
                $consulta->bindParam(':ubicacion_parqueadero', $this->ubicacion_parqueadero);
                $consulta->bindParam(':cupos_parqueadero', $this->cupos_parqueadero);
                $consulta->bindParam(':horario_parqueadero', $this->horario_parqueadero);
                $consulta->bindParam(':id', $this->id);
            
                $consulta->execute();

            }else{
                $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre_parqueadero, ubicacion_parqueadero, cupos_parqueadero, horario_parqueadero, id_administrador) 
                VALUES (:nombre_parqueadero, :ubicacion_parqueadero, :cupos_parqueadero, :horario_parqueadero, :id_administrador)');

                $consulta->bindParam(':nombre_parqueadero', $this->nombre_parqueadero);
                $consulta->bindParam(':ubicacion_parqueadero', $this->ubicacion_parqueadero);
                $consulta->bindParam(':cupos_parqueadero', $this->cupos_parqueadero);
                $consulta->bindParam(':horario_parqueadero', $this->horario_parqueadero);
                $consulta->bindParam(':id_administrador', $this->id_administrador);
            
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

    public static function mostrar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('SELECT id, nombre_parqueadero, ubicacion_parqueadero, cupos_parqueadero, horario_parqueadero, id_administrador FROM ' . self::TABLA . ' ORDER BY id');
            $consulta->execute();
            $registros = $consulta->fetchAll();
    
            return $registros;
        } catch (PDOException $e) {
            // Manejo de errores, puedes imprimir el mensaje de error o hacer lo que consideres necesario
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return false;
        }
    }
    
    
    public static function obtenerPorId($id) {
        $parqueaderos = self::mostrar();
    
        foreach ($parqueaderos as $parqueadero) {
            if ($parqueadero['id'] == $id) {
                return $parqueadero;
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
    
    public static function obtenerDatosParqueadero() {
        $parqueaderos = self::mostrar(); // Supongamos que ya tienes un método mostrar en tu clase
        $administradores = Administrador::mostrar();
    
        $datosCompletos = [];
    
        foreach ($parqueaderos as $parqueadero) {
            $datosParqueadero = $parqueadero; // Variable auxiliar para almacenar los datos completos
    
            foreach ($administradores as $administrador) {
                if ($parqueadero['id_administrador'] == $administrador['id']) {
                    $datosParqueadero['nombre'] = $administrador['nombre'];
                    break; // Si encontramos el administrador, salimos del bucle interno
                }
            }
    
            $datosCompletos[] = $datosParqueadero;
        }
    
        return $datosCompletos;
    }
    
}