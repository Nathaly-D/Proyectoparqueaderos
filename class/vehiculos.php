<?php

require_once '../config/conexion.php';
require_once 'clientes.php';
require_once 'tipoVehiculos.php';

class Vehiculo{
    private $id;
    protected $placa;
    public $marca;
    public $modelo;
    public $altura;
    public $ancho;
    public $id_cliente;
    public $id_tipoVehiculo;


    const TABLA = 'vehiculos';

    public function getId(){
        return $this->id;
    }

    public function getPlaca(){
        return $this->placa;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function getAncho(){
        return $this->ancho;
    }

    public function getId_cliente(){
        return $this->id_cliente; 
    }

    public function getId_tipoVehiculo(){
        return $this->id_tipoVehiculo; 
    }

    public function setPlaca($placa){
        return $this->placa = $placa;

    }

    public function setMarca($marca){
        return $this->marca = $marca;
    }

    public function setModelo($modelo){
        return $this->modelo = $modelo;
    }

    public function setAltura($altura){
        return $this->altura = $altura;
    }

    public function setAcho($ancho){
        return $this->ancho = $ancho;
    }

    public function setId_cliente($id_cliente){
        return $this->id_cliente = $id_cliente;
    }
    
    public function setId_tipoVehiculo($id_tipoVehiculo){
        return $this->id_tipoVehiculo = $id_tipoVehiculo;
    }
    
    //Constructor

    public function __construct($placa, $marca, $modelo, $altura, $ancho, $id_cliente, $id_tipoVehiculo, $id=null){
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->altura = $altura;
        $this->ancho = $ancho;
        $this->id_cliente = $id_cliente;
        $this->id_tipoVehiculo = $id_tipoVehiculo;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            if($this->id){
                $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET placa = :placa, marca = :marca, modelo = :modelo, altura = :altura,
                ancho = :ancho, id_tipoVehiculo = :id_tipoVehiculo WHERE id = :id');
            
                $consulta->bindParam(':placa', $this->placa);
                $consulta->bindParam(':marca', $this->marca);
                $consulta->bindParam(':modelo', $this->modelo);
                $consulta->bindParam(':altura', $this->altura);
                $consulta->bindParam(':ancho', $this->ancho);
                $consulta->bindParam(':id_tipoVehiculo', $this->id_tipoVehiculo);
                $consulta->bindParam(':id', $this->id);                   
                $consulta->execute();

            }else{
                $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (placa, marca, modelo, altura, ancho, id_cliente, id_tipoVehiculo) 
                VALUES (:placa, :marca, :modelo, :altura, :ancho, :id_cliente, :id_tipoVehiculo)');
            
                $consulta->bindParam(':placa', $this->placa);
                $consulta->bindParam(':marca', $this->marca);
                $consulta->bindParam(':modelo', $this->modelo);
                $consulta->bindParam(':altura', $this->altura);
                $consulta->bindParam(':ancho', $this->ancho);
                $consulta->bindParam(':id_cliente', $this->id_cliente);
                $consulta->bindParam(':id_tipoVehiculo', $this->id_tipoVehiculo);                 
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
        $consulta = $conexion -> prepare('SELECT id, placa, marca, modelo, altura, ancho, id_cliente, id_tipoVehiculo FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }
    
    public static function obtenerPorId($id) {
        $vehiculos = self::mostrar();
    
        foreach ($vehiculos as $vehiculo) {
            if ($vehiculo['id'] == $id) {
                return $vehiculo;
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

    public static function obtenerDatosVehiculo() {
        $vehiculos = self::mostrar(); // Supongamos que ya tienes un método mostrar en tu clase
        $clientes = Cliente::mostrar();
        $tipo_vehiculos = Tipo::mostrar();
    
        $datosCompletos = [];
    
        foreach ($vehiculos as $vehiculo) {
            foreach ($clientes as $cliente) {
                if ($vehiculo['id_cliente'] == $cliente['id']) {
                    $vehiculo['nombre'] = $cliente['nombre'];
                    break; // Si encontramos el cliente, salimos del bucle interno
                }
            }
    
            foreach ($tipo_vehiculos as $tipo_vehiculo) {
                if ($vehiculo['id_tipoVehiculo'] == $tipo_vehiculo['id']) {
                    $vehiculo['vehiculoT'] = $tipo_vehiculo['vehiculoT'];
                    break; // Si encontramos el tipo de vehículo, salimos del bucle interno
                }
            }
    
            // Asegurémonos de que las claves necesarias estén definidas
            if (isset($vehiculo['nombre'], $vehiculo['vehiculoT'])) {
                $datosCompletos[] = $vehiculo;
            } else {
                // Puedes agregar un mensaje de error o manejo aquí
            }
        }
    
        return $datosCompletos;
    }

    public static function obtenerCantidadVehiculos() {
        try {
            $vehiculos = self::mostrar(); // Supongamos que ya tienes un método mostrar en tu clase
            return count($vehiculos);
        } catch (PDOException $e) {
            // Manejo de errores, puedes imprimir el mensaje de error o hacer lo que consideres necesario
            echo "Error al obtener la cantidad de vehículos: " . $e->getMessage();
            return false;
        }
    }
    
}