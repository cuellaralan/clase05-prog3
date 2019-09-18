<?php
include_once "./funciones.php";
class Alumno
{
    public $_nombre;
    public $_apellido;
    public $_legajo;
    public $_foto;
    public function __construct($nombre, $apellido, $legajo, $foto)
    {
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_legajo = $legajo;
        $this->_foto = $foto;
    }
    public function datosPersona(){
        return "NOMBRE:" . $this->_nombre . ";". "APELLIDO:" . $this->_apellido . ";". "LEGAJO: ".$this->_legajo;
    }
    public function toJson($array){
      return  json_encode($array);
    }
    public function toObject(){
        return json_decode($this);
    }
}