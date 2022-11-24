<?php

//horas
echo "<br>La hora es: " . time(); //El número que da es la cantidad de segundos que han pasado desde 1970 (el día en concreto que crearon UNIX). Hay que pasarlo por un conversor epoch

echo "<br>La hora es: " . strtotime("+1 month"); //El tiempo actual + 1 mes


//fechas: date, datetime
echo "<br>La fecha es: " . date("d/F/y"); // d-> dias con 0 iniciales F-> palabra del mes  y-> ultimos digitos del año. La / no es obligatoria, es para añadirle un diseño a la fecha devuelta

echo "<br><br>Usando new DateTime('now') --->";
//Objeto de la clase DateTime. Siempre va a devolver un objeto de esa clase. NOW -> Enter "now" here to obtain the current time when using the $timezone parameter.
$fecha = new DateTime("now"); 
var_dump($fecha);

echo "<br><br> Usando new DateTime('+11 weeks')--->" ;
//Acepta sintaxis strtotime(). Le hemos dicho que nos muestre la fecha 11 semanas en el futuro desde hoy (la fecha actual)
$fecha = new DateTime("+11 weeks");
var_dump($fecha);
// echo "La fecha es: " . $fecha; NO se podría, ya que dará un error al no poder convertir una variable objeto en string
echo "<br><br>Usando format --->";
//Para devolver un objeto DateTIme en string hay un metodo particular de DateTime que lo transforma
echo "La fecha es: " . $fecha->format("d@M@Y"); //Quiero sacar los días con 0 inicial (d), @ para separación, mes con 3 letras (M) y año con 4 digitos (Y)


//Para mostrar una fecha personalizada. Devolverá un objeto fecha con la fecha insertada y el formato dado es para que entienda la posicion de cada fecha.
echo"<br><br> Para hacerlo con fecha personalizada: --->";
$mifecha = DateTime::createFromFormat("d/m/Y", "12/10/2018"); //Formatea la cadena dada (fecha) en el formato dado. TIene que cuadrar el formato con el string dado
var_dump($mifecha);
echo "<br>";
echo "Fecha en formato español: " . $mifecha->format("j-n-Y");