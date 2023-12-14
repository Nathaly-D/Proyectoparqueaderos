<?php

class Conexion extends PDO{
    private $tipo_De_base = 'mysql';
    private $host = 'localhost';
    private $nombre_de_base = 'parqueaderobd';
    private $usuario = 'root';
    private $contrasena = '';
    public function __construct(){
        //Sobreescribo el metodo constructor de la clase PDO
        try{
            parent::__construct("{$this->tipo_De_base}:dbname={$this->nombre_de_base};host={$this->host};charset=utf8",$this->usuario, $this->contrasena);
        }catch(PDOException $e){
            echo 'Ha surgido un error y no sepuede conectar a la base de datos. Detalle: '. $e->getMessage();
            exit;
        }
    }
}