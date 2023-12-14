<?php

require_once '../config/conexion.php';

class Administrador{
    private $id;
    private $nombre;
    private $apellido;
    private $documento;
    private $usuario;
    private $clave;

    const TABLA = 'administradores';

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getClave(){
        return $this->clave;
    }
    

    public function setNombre($nombre){
        return $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        return $this->apellido = $apellido;
    }

    public function setDocumento($documento){
        return $this->documento = $documento;
    }

    public function setUsuario($usuario){
        return $this->usuario = $usuario;
    }

    public function setClave($clave){
        return $this->clave = $clave;
    }    

    public function __construct($nombre, $apellido, $documento, $usuario, $clave, $id = null){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            if($this->id){
                $conexion = new Conexion();
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, apellido = :apellido, clave = :clave 
                WHERE id = :id');
                $consulta->bindParam(':nombre', $this->nombre);
                $consulta->bindParam(':apellido', $this->apellido);
                $consulta->bindParam(':clave', $this->clave);
                $consulta->bindParam(':id', $this->id);
                $consulta->execute();
            }else{
                $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, apellido, documento, usuario, clave) 
            VALUES (:nombre, :apellido, :documento, :usuario, :clave)');
            
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':documento', $this->documento);
            $consulta->bindParam(':usuario', $this->usuario);
            $consulta->bindParam(':clave', $this->clave); // Cambié :clave a :clave
            
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
        $consulta = $conexion -> prepare('SELECT id, nombre, apellido, documento, usuario, clave FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

    public static function obtenerPorId($id) {
        $administradores = self::mostrar();
    
        foreach ($administradores as $admin) {
            if ($admin['id'] == $id) {
                return $admin;
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

    public static function obtenerCantidadAdministradores() {
        try {
            $administradores = self::mostrar(); // Supongamos que ya tienes un método mostrar en tu clase
            return count($administradores);
        } catch (PDOException $e) {
            // Manejo de errores, puedes imprimir el mensaje de error o hacer lo que consideres necesario
            echo "Error al obtener la cantidad de administradores: " . $e->getMessage();
            return false;
        }
    }

}