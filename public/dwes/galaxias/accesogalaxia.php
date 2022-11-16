<?php

    namespace Dwes\Galaxias;

    echo "<br> Namespace actual: " . __NAMESPACE__; //Constante mágica de php

    /**
     * Direccionamiento namespace:
     * 1- Sin direccionamiento
     * 2- Direccionamiento relativo
     * 3- Direccionamiento absoluto
     */

    

    //SIN DIRECCIONAMIENTO
    include "galaxia1.php"; //Hay que incluir el fichero con el que vamos a trabajar
    echo "<h2>Sin direccionamiento</h2>";
    echo "<br> Radio de la galaxia: " . RADIO; //Lo obtenemos de galaxia1.php del include
    observar("Vía Lactea");
    $gl = new Galaxia(); //Creamos objeto de galaxia1.php
    Galaxia::muerte(); //Llamamos a muerte de galaxia1 con :: ya que es estatico
    //Fin SIN DIRECCIONAMIENTO


    //DIRECCIONAMIENTO RELATIVO  --  Tendremos en cuenta desde la ubicación donde se encuentra este ficher
    include "pegaso/pegaso.php";
    echo "<h2>Direccionamiento Relativo</h2>"; //o
    echo "<br> Radio de la galaxia: " . Pegaso\RADIO; //Lo invocamos poniendo el nombre del namespace y la constante
    Pegaso\observar("Pegaso"); //Namespace + función
    $gl = new Pegaso\Galaxia(); 
    Pegaso\Galaxia::muerte(); //Creamos una galaxia de pegaso, no de galaxia1.php
    //DIRECCIONAMIENTO RELATIVO


    //DIRECCIONAMIENTO ABSOLUTO -- Contaremos desde la raiz del servidor web (Public)
    //include "pegaso/pegaso.php"; Ya lo tenemos arriba
    echo "<h2>Direccionamiento Absoluto</h2>"; 
    echo "<br> Radio de la galaxia: " . \Dwes\Galaxias\Pegaso\RADIO; //Lo invocamos poniendo el nombre del namespace y la constante
    \Dwes\Galaxias\Pegaso\observar("Pegaso"); //Namespace + función
    $gl = new \Dwes\Galaxias\Pegaso\Galaxia(); 
    \Dwes\Galaxias\Pegaso\Galaxia::muerte(); //Creamos una galaxia de pegaso, no de galaxia1.php
    //DIRECCIONAMIENTO ABSOLUTO



    use const \Dwes\Galaxias\RADIO;//Sirve para utilizar un elemento en particular de ese namespace
    //Si quiero coger los 2 RADIO me daria error. No se puede poner 2 veces el mismo nombre. Habría que hacerlo con alias
    //Igualmente si pusieramos ambos el 2º machararía al 1º y cogería ese valor.
    use function \Dwes\Galaxias\Pegaso\observar; 
    echo "<br>El radio de galaxia1.php es : " . RADIO;

    echo "<br> Observo en pegaso: " . observar("Otra galaxia");

    echo "<br> Objeto de galaxia generico: " . new Galaxia();

     
    //Apodar namespace -> alias
    use \Dwes\Galaxias\Pegaso as Seiya;
    use \Dwes\Galaxias as Galaxus;

    Seiya\observar("Observando a Seiya");
    Galaxus\observar("Observando a Galaxus");

    use \Dwes\Galaxias\Pegaso\Galaxia as Seiya1; //Renombramos el nombre de la clase a Seiya1
    use \Dwes\Galaxias\Galaxia as Galaxus1;

    echo "<br>Esto es un cambio de nombre de clase Galaxia en Pegaso a Seiya1:" . new Seiya1();

    echo "<br>Esto es un cambio de nombre de clase Galaxia en galaxia a Galaxus1" . new Galaxus1();