<?php   
    class VagonCarga extends Vagon {
        //VARIABLES INSTANCIA - ATRIBUTOS
        private $pesoMaximo;
        private $pesoTransportado;
        
        //METODO CONSTRUCTOR
        public function __construct($pesoVagonVacio, $pesoMaximo, $pesoTransportado){
            parent::__construct($pesoVagonVacio);
            $this -> pesoMaximo = $pesoMaximo;
            $this -> pesoTransportado = $pesoTransportado;
        }

        //METODO DE ACCESI GETTERS Y SETTERS
        public function setPesoMaximo($pesoMaximo){
            $this -> pesoMaximo = $pesoMaximo;
        }
        public function getPesoMaximo(){
            return $this -> pesoMaximo;
        }
        public function setPesoTransportado($pesoTransportado){
            $this -> pesoTransportado = $pesoTransportado;
        }
        public function getPesoTransportado(){
            return $this -> pesoTransportado;
        }

        //METODO TOSTRING
        public function __toString() {
            $mensaje = parent::__toString();
            $mensaje .= "\n----------VAGON DE CARGA----------\n";
            $mensaje .= "Peso de maximo: " . $this -> getPesoMaximo() . "\n";
            $mensaje .= "Peso de carga transportado: " . $this -> getPesoTransportado() . "\n";

            return $mensaje;
        }

        /** Si se trata de un vagón de carga se almacena el peso máximo que puede transportar y el peso de 
         * su carga transportada. El peso del vagón va a depender del peso de su carga más un 
         * índice que coincide con un 20 % del peso de la carga, dicho índice se guarda en cada vagón de carga. 
         * @return $pesoVagonActual
        
        */

        public function calcularPesoVagon(){
            $pesoVagonActual = 0;
            $pesoActual = parent::calcularPesoVagon();//Obtengo el peso del vagon vacio
            $pesoCarga = $this -> getPesoTransportado();//Obtengo el peso de la carga
            
            $pesoVagonActual = $pesoActual + ($pesoActual* 1.2);
            $pesoVagon = $pesoVagonActual + $pesoActual;
            return $pesoVagon;
        }
        
        /** Implementar  el método incorporarCargaVagon  que recibe por parámetro la cantidad de carga que va
         *a transportar el  vagón y tiene la responsabilidad de actualizar las variables instancias que representan
         *el peso y la carga actual. El método debe devolver verdadero o falso según si se pudo o no agregar la
         *carga al vagón.   
         * @param float $cantidadCarga
         * @return booleano $cargado
        */

        public function incorporarCargaVagon($cantidadCarga){
            $cargado = false;
            
            $pesoMaximo = $this -> getPesoMaximo();//Obtengo el peso maximo
            $pesoCarga = $this -> getPesoTransportado();//Obtengo el peso de la carga

            if ($pesoCarga + $cantidadCarga < $pesoMaximo) {
                $totalCarga = $pesoCarga + $cantidadCarga;
                $this -> setPesoTransportado($totalCarga);
                $pesoActual = parent::calcularPesoVagon();//Obtengo el peso del vagon vacio
                parent::setPesoActual($pesoActual);
                $cargado = true;
            }
            return $cargado;
        }

    }
        



?>