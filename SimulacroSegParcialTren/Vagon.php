<?php

    class Vagon {
        //ATRIBUTOS - VARIABLES INSTANCIA
        private $anioInstalacion;
        private $largo;
        private $ancho;
        private $pesoVagonVacio;
        private $pesoActual;

        //METODO CONSTRUCTOR
        public function __construct($pesoVagonVacio){
            $this -> anioInstalacion = 1983;
            $this -> largo = 1000;
            $this -> ancho = 500;
            $this -> pesoVagonVacio = $pesoVagonVacio;
            $this -> pesoActual = $pesoVagonVacio;
        }

        //METODO SETTER Y GETTER
        public function setAnioInstalacion($anioInstalacion){
            $this -> anioInstalacion = $anioInstalacion;
        }
        public function getAnioInstalacion(){
            return $this -> anioInstalacion;
        }
        public function setLargo($largo){
            $this -> largo = $largo;
        }
        public function getLargo(){
            return $this -> largo;
        }
        public function setAncho($ancho){
            $this -> ancho = $ancho;
        }
        public function getAncho(){
            return $this -> ancho;
        }
        public function setpesoVagonVacio($pesoVagonVacio){
            $this -> pesoVagonVacio = $pesoVagonVacio;
        }
        public function getpesoVagonVacio(){
            return $this -> pesoVagonVacio;
        }

        public function setPesoActual($pesoActual){
            $this -> pesoActual = $pesoActual;
        }
        public function getPesoActual(){
            return $this -> pesoActual;
        }

        public function __toString() {
            $mensaje = "\n------VAGON------\n";
            $mensaje .= "Anio de instalacion: " . $this -> getAnioInstalacion() . "\n";
            $mensaje .= "Largo: " . $this -> getLargo() . "\n";
            $mensaje .= "Ancho: " . $this -> getAncho() . "\n";
            $mensaje .= "Peso del vagon vacio: " . $this -> getpesoVagonVacio() . "\n";
            return $mensaje;
        }

        /** Implementar el método calcularPesoVagon y redefinirlo según sea necesario. No olvidar agregar el
          * peso que tiene el vagón vacío.  
        */

        public function calcularPesoVagon(){
            $pesoVagon = $this -> getpesoVagonVacio();//obtengo el valor del peso del vagon vacio
            $pesoActual = $pesoVagon;
            $this -> setPesoActual($pesoActual);

            return $pesoActual;
        }
    }




?>