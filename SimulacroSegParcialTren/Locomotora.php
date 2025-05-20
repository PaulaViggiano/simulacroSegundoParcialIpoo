<?php
    class Locomotora{
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $pesoLocomotora;
        private $velocidadMaxima;

        //METODO CONSTRUCTOR
        public function __construct($pesoLocomotora, $velocidadMaxima){
            $this -> pesoLocomotora = $pesoLocomotora;
            $this -> velocidadMaxima = $velocidadMaxima;
        }

        //METODO SETTER Y GETTER
        public function setPesoLocomotora($pesoLocomotora){
            $this -> pesoLocomotora = $pesoLocomotora;
        }
        public function getPesoLocomotora(){
            return $this -> pesoLocomotora;
        }
        public function setVelocidadMaxima($velocidadMaxima){
            $this -> velocidadMaxima = $velocidadMaxima;
        }
        public function getVelocidadMaxima(){
            return $this -> velocidadMaxima;
        }
        //METODO TOSTRING
        public function __toString() {
            $mensaje = "\n------LOCOMOTORA------\n";
            $mensaje .= "Peso de la locomotora: " . $this -> getPesoLocomotora() . "\n";
            $mensaje .= "Velocidad maxima: " . $this -> getVelocidadMaxima() . "\n";
            return $mensaje;
        }
        
    }


?>