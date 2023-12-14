<?php

require_once '../config/conexion.php';

class Tipo{
    public $id;
    public $vehiculoT;
    
    const TABLA = 'tipovehiculos';

    public function getId(){
        return $this->id;
    }

    public function getVehiculoT(){
        return $this->vehiculoT;
    }

    public function setVehiculoT($vehiculoT){
        return $this->vehiculoT = $vehiculoT;

    }
    
    //Constructor

    public function __construct($vehiculoT, $id=null){
        $this->vehiculoT = $vehiculoT;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            if($this->id){
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET vehiculoT = :vehiculoT WHERE id = :id');
            
                $consulta->bindParam(':vehiculoT', $this->vehiculoT);
                $consulta->bindParam(':id', $this->id);                   
                $consulta->execute();

            }else{
                $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (vehiculoT) 
                VALUES (:vehiculoT)');
            
                $consulta->bindParam(':vehiculoT', $this->vehiculoT);                  
                $consulta->execute();
            }
            
            $this->id = $conexion->lastInsertId();
        } catch (PDOException $e) {
            // Manejar la excepción (por ejemplo, imprimir el mensaje de error)
            echo "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion -> prepare('SELECT id, vehiculoT FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

    public static function obtenerPorId($id) {
        $vehiculosT = self::mostrar();
    
        foreach ($vehiculosT as $vehiculoT) {
            if ($vehiculoT['id'] == $id) {
                return $vehiculoT;
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

}