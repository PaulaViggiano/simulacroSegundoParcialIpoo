<?php
    class Formacion{
        //Variables instancia - Atributos
        private $objLocomotora;
        private $arrayVagones;
        private $cantMaximaVagones;

        //Metodo constructor
        public function __construct($objLocomotora, $arrayVagones, $cantMaximaVagones){
            $this -> objLocomotora = $objLocomotora;
            $this -> arrayVagones = $arrayVagones;
            $this -> cantMaximaVagones = $cantMaximaVagones;
        
        }
        //Metodo de acceso - Getters y Setters
        public function setObjLocomotora($objLocomotora){
            $this -> objLocomotora = $objLocomotora;
        }
        public function getObjLocomotora(){
            return $this -> objLocomotora;
        }
        public function setArrayVagones($arrayVagones){
            $this -> arrayVagones = $arrayVagones;
        }
        public function getArrayVagones(){
            return $this -> arrayVagones;
        }
        public function setCantMaximaVagones($cantMaximaVagones){
            $this -> cantMaximaVagones = $cantMaximaVagones;
        }
        public function getCantMaximaVagones(){
            return $this -> cantMaximaVagones;
        }
        //Metodo toString
        public function __toString() {
            $vagones = $this -> getArrayVagones();//Obtengo el array de vagones
            $mensajeVagones = "";//Inicializo el mensaje vacio 
            foreach ($vagones as $vagon) {
                $mensajeVagones .= $vagon;//Voy guardando los vagones en el mensaje
            }

            $mensaje = "\n------FORMACION------\n";
            $mensaje .= "Locomotora: " . $this -> getObjLocomotora() . "\n";
            $mensaje .= "Cantidad maxima de vagones: " . $this -> getCantMaximaVagones() . "\n";
            $mensaje .= "Vagones: \n";
            $mensaje .= $mensajeVagones;
            
            return $mensaje;
        }

        /** Implementar el método incorporarPasajeroFormacion que recibe la cantidad de pasajeros que se
         *desea incorporar a la formación y busca dentro de la colección de vagones aquel vagón capaz de
         *incorporar esa cantidad de pasajeros. Si no hay ningún vagón en la formación que  pueda ingresar la
         *cantidad de pasajeros, el método debe retornar un valor falso y verdadero en caso contrario. Puede
         *utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.   
         *@param int $cantPasajeros
         *@return boolean $incorporado
        */

        public function incorporarPasajeroFormacion($cantPasajeros){
            $incorporado = false;//variable de retorno
            $vagones = $this -> getArrayVagones();//Obtengo el array de vagones
            /* Foreach para recorrer el arreglo y encontrar el vagon de pasajeros */
            foreach ($vagones as $vagon) {
                /* Utilizo la funcion de php is_a para saber si el vagon obtenido es de pasajeros */
                $esPasajeros = is_a($vagon, "VagonPasajeros");
                if ($esPasajeros) {
                    /* Chequeo si se puede incorporar el pasajero. Primero invoco la funcion y luego hago el if */
                    $sePuedeIncorporar = $vagon -> incorporarPasajeroVagon($cantPasajeros);
                    /* Si se puede incorporar el pasajero, seteo la variable de retorno en true */
                    if ($sePuedeIncorporar) {
                        /* $pasajeros = $vagon -> getCantPasajerosTransportando();
                        $pasajeros += $cantPasajeros;
                        $vagon -> setCantPasajerosTransportando($pasajeros); */
                        $incorporado = true;
                    }
                }
            }
            return $incorporado;
        }

        /** Implementar el método incorporarVagonFormacionque recibe por parámetro un objeto vagón y lo
         *incorpora a la formación. El método retorna verdadero si la incorporación se realizó con éxito 
         *y falso en caso contrario.  
         *@param object $objVagon
         *@return boolean $incorporado
        */

        public function incorporarVagonFormacion($objVagon){
            //Inicializo la variable de retorno en false
            $incorporado = false;
            //obtengo la cantidad maxima de vagones
            $maxVagones = $this -> getCantMaximaVagones(); 
            //Obtengo el arreglo de vagones
            $arregloVagones = $this -> getArrayVagones();
            $cantArreglo = count($arregloVagones);

            if ($cantArreglo < $maxVagones) {
                $arregloVagones[] = $objVagon;
                $this -> setArrayVagones($arregloVagones);
                $incorporado = true;
            }

            return $incorporado;
        }

        /** Implementar el método promedioPasajeroFormacion el cual recorre la colección de vagones y retorna
         *un valor que represente el promedio de pasajeros por vagón que se encuentran en la formación. Puede
         *utilizar la función is_a para saber si se trata de un vagón de carga o de pasajeros.   
         *@return float $promedioPasajeros;
        */
        public function promedioPasajeroFormacion(){
            
            $promedioPasajeros = null;//declaro la variable de retorno
            $pasajeros = 0;//declaro variable para ir sumando los pasajeros
            $cantVagones = 0;//cantidad de vagones para calcular el prom.
            $arregloVagones = $this -> getArrayVagones(); //Obtengo el arreglo de vagones

            /* Metodo forEach para ir capturando la cantidad de pasajeros */
            foreach ($arregloVagones as $vagon) {
                $esPasajeros = is_a($vagon, "VagonPasajeros");//Obtengo un booleano de si el vagon es de pasajeros o no
                if ($esPasajeros) {
                  $pasajerosVagon = $vagon -> getCantPasajerosTransportando();//Obtengo la cantidad de pasajeros en el vagon 
                  $pasajeros += $pasajerosVagon;
                  $cantVagones++; 
                }
            }
            if ($pasajeros > 0) {
                $promedioPasajeros = $pasajeros / $cantVagones;
            }
            
            return $promedioPasajeros;
        }

        /** Implementar el método pesoFormacion el cual retorna el peso de la formación completa.  
         * @return float $pesoFormacionTotal;
        */
        public function pesoFormacion(){
            $vagones = $this -> getArrayVagones();//Obtengo el arreglo de vagones
            $pesoFormacion = 0;//Variable para ir sumando el peso inicializada en cero
           
            $pesoLocomotora = $this -> getObjLocomotora() -> getPesoLocomotora();//Obtengo el peso de la locomotora
            /* ForEach para recorrer el arreglo y obtener el peso de cada vagon */
            foreach ($vagones as $vagon) {
                
                    $peso = $vagon -> calcularPesoVagon();//Obtengo el peso del vagon de Pasajeros
                    $pesoFormacion += $peso;//Voy sumando
                
            }
            
                $pesoFormacion += $pesoLocomotora;//Sumo el peso de todos los vagones mas el de la locomotora

            return $pesoFormacion;
        }

        /** Implementar el método retornarVagonSinCompletar el cual retorna el primer vagón de la formación que
         *aún no se encuentra completo 
         *@return object $vagonSinCompletar; 
        */
        public function retornarVagonSinCompletar(){
            $vagones = $this -> getArrayVagones();//Obtengo el arreglo de vagones
            $cantVagones = count($vagones);//Variable para el ciclo
            $vagonSinCompletar = null;//Variable de retorno
            $seEncontro = false;//Variable para cortar el ciclo en caso de encontrar el primer vagon sin completar
            $i = 0;//Variable iteradora

            while ($i < $cantVagones && !$seEncontro) {
                $elVagon = $vagones[$i];//obtengo cada posicion del arreglo
                $esPasajeros = is_a($elVagon, "VagonPasajeros");//verifico si es vagon de pasajeros
                $esCarga = is_a($elVagon, "VagonCarga");//verifico si es vagon de carga
                if ($esPasajeros) {
                    $cantMaxima = $elVagon -> getCantMaximaPasajeros();//Obtengo la cantidad maxima de pasajeros
                    $cantPasajeros = $elVagon -> getCantPasajerosTransportando();//Obtengo la cantidad de pasajeros transportados
                 if ($cantPasajeros < $cantMaxima) {
                    $vagonSinCompletar = $elVagon; //Guardo el vagon sin completar
                    $seEncontro = true;//Modifico la variable bandera para salir del while
                 }
                } elseif ($esCarga) {
                    $pesoMaximo = $elVagon -> getPesoMaximo();//Obtengo el peso maximo
                    $pesoTransportado = $elVagon -> getPesoTransportado();//Peso transportado
                    if ($pesoTransportado < $pesoMaximo) {
                        $vagonSinCompletar = $elVagon;//Guardo el vagon sin completar
                        $seEncontro = true;
                    }
                }
                $i++;
            }
            return $vagonSinCompletar;

        }
    }



?>