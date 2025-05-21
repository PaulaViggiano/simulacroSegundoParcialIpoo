<?php
    class VagonPasajeros extends Vagon {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $cantMaximaPasajeros;
        private $cantPasajerosTransportando;
        private $pesoPasajeros;

        //METODO CONSTRUCTOR
        public function __construct($anioInstalacion, $largo, $ancho,$pesoVagonVacio, $cantMaximaPasajeros, $cantPasajerosTransportando){
            parent::__construct($anioInstalacion, $largo, $ancho,$pesoVagonVacio);
            $this -> cantMaximaPasajeros = $cantMaximaPasajeros;
            $this -> cantPasajerosTransportando = $cantPasajerosTransportando;
            $this -> pesoPasajeros = 50;
        }

        //METODOS DE ACCESO GETTERS - SETTERS
        public function setCantMaximaPasajeros($cantMaximaPasajeros){
            $this -> cantMaximaPasajeros = $cantMaximaPasajeros;
        }   
        public function getCantMaximaPasajeros(){
            return $this -> cantMaximaPasajeros;
        }
        public function setCantPasajerosTransportando($cantPasajerosTransportando){
            $this -> cantPasajerosTransportando = $cantPasajerosTransportando;
        }
        public function getCantPasajerosTransportando(){
            return $this -> cantPasajerosTransportando;
        }
        public function setPesoPasajeros($pesoPasajeros){
            $this -> pesoPasajeros = $pesoPasajeros;
        }
        public function getPesoPasajeros(){
            return $this -> pesoPasajeros;
        }
        
        //METODO TO STRING
        public function __toString() {
            $mensaje = parent::__toString();
            $mensaje .= "\n------VAGON PASAJEROS------\n";
            $mensaje .= "Cantidad maxima de pasajeros: " . $this -> getCantMaximaPasajeros() . "\n";
            $mensaje .= "Cantidad de pasajeros transportando: " . $this -> getCantPasajerosTransportando() . "\n";
            $mensaje .= "Peso de los pasajeros: " . $this -> getPesoPasajeros() . "\n";
            return $mensaje;
        }

        /** Es importante tener en cuenta que la variable de instancia que representa el  peso del 
         * vagón se calcula de acuerdo a la cantidad de pasajeros que se está transportando y 
         * considerando un peso promedio por pasajero de 50 Kilos..
         * @return $pesoVagonActual
        */

        public function calcularPesoVagon(){
            $pesoVagonActual = 0;
            $pesoActual = parent::calcularPesoVagon();//Obtengo el peso del vagon vacio
            $pesoPas = $this -> getPesoPasajeros();//Obtengo el peso de los pasajeros
            $cantPasajeros = $this -> getCantPasajerosTransportando();//Obtengo la cantidad de Pasajeros

            $pesoVagonActual = $pesoActual + ($cantPasajeros * $pesoPas);


            return $pesoVagonActual;
        }

        /** Implementar  el método incorporarPasajeroVagon  que recibe por parámetro la cantidad de pasajeros
         *que ingresan al vagón y tiene la responsabilidad de actualizar las variables instancias que representan
         * el peso y la cantidad actual de pasajeros.El método debe devolver verdadero o falso según si se 
         * pudo o no agregar los pasajeros al vagón.   
         * @param int $cantPasajeros
         * @return booleano $agregado
        */

        public function incorporarPasajeroVagon($cantPasajeros){
            $maximoPasajeros = $this -> getCantMaximaPasajeros();//Obtengo la cantidad maxima de pasajeros
            $pasajerosEnVagon = $this -> getCantPasajerosTransportando();//Obtengo la cantidad de pasajeros ya en el vagon
            $totalPasajeros = 0;//Para setear la cantidad de pasajeros en vagon
            $agregado = false;//Variable de retorno

            if (($pasajerosEnVagon + $cantPasajeros) < $maximoPasajeros) {
                $totalPasajeros = $pasajerosEnVagon + $cantPasajeros;//Calculo la cantidad de pasajeros en vagon
                $this -> setCantPasajerosTransportando($totalPasajeros);//Guardo la cantidad de pasajeron en vagon

                /* Calculo el peso del vagon con los nuevos pasajeros */
                $pesoActual = $this -> calcularPesoVagon();
                parent::setPesoActual($pesoActual);

                $agregado = true;
            }

            return $agregado;

        }

    }



?>
