<?php
    include_once 'Vagon.php';
    include_once 'VagonPasajeros.php';
    include_once 'VagonCarga.php';
    include_once 'Locomotora.php';
    include_once 'Formacion.php';

    /* Se crea un objeto locomotora con un peso de 188 toneladas y una velocidad de 140 km/h. */
    $laLocomotora = new Locomotora(188, 140);

    /* Se crea 3 objetos con la  información visualizada en la tabla: */
    $vagonPasajeros1 = new VagonPasajeros(15000, 50, 25);
    $vagonCarga = new VagonCarga(15000, 100000, 55000);
    $vagonPasajeros2 = new VagonPasajeros(15000, 50, 50);

    /* Se crea un objeto formación que tiene la locomotora y los vagones creados en (1) y (2) usando el método
     incorporarVagonFormacion. 
    */
    $laFormacion = new Formacion($laLocomotora, [], 5);
    $laFormacion -> incorporarVagonFormacion($vagonPasajeros1);
    $laFormacion -> incorporarVagonFormacion($vagonCarga);
    $laFormacion -> incorporarVagonFormacion($vagonPasajeros2);

    /* Invocar al método  incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 6 y
     visualizar el resultado. 
    */
    $laFormacion -> incorporarPasajeroFormacion(6);
    /* echo $laFormacion; */

    /* Realizar un print de los 3 objetos vagones creados. */
    /* echo $vagonCarga;
    echo $vagonPasajeros1;
    echo $vagonPasajeros2; */

    /* Invocar al método  incorporarPasajeroFormacion con el parámetros cantidad de pasajero = 14 y
     visualizar el resultado. 
    */
    /* echo $laFormacion; */
    $laFormacion -> incorporarPasajeroFormacion(14);
    /* echo $laFormacion; */

    /* Realizar un print del objeto locomotora */
    /* echo $laLocomotora; */

    /* Invocar al método  promedioPasajeroFormacion y visualizar el resultado obtenido. */
    $prom = $laFormacion -> promedioPasajeroFormacion();
    echo "Promedio " . $prom;

    /* Invocar al método pesoFormacion y visualizar el resultado obtenido. */
    $peso = $laFormacion -> pesoFormacion();
    echo "Peso " . $peso;


?>