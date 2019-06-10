<?php
//Obtenemos los datos de los input
$variable = $_POST["curso"];

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array

//por curso seleccionar todos los nombres de los alumnos
if($_POST['curso']){
    $total_alumnos = "select count(*) as total from test1";  
	$consulta1 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 1| 2| 3| 4| 5') GROUP BY nombre";
    $consulta2 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 6| 7| 8| 9| 10') GROUP BY nombre";  
    
    $consulta3 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 11|12| 13| 14| 15') GROUP BY nombre"; 
    $consulta4 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 15| 16| 17| 18| 19| 20') GROUP BY nombre"; 
    
    $consulta5 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 21| 22| 23| 24| 25') GROUP BY nombre";
    $consulta6 = "select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 26| 27| 28| 29| 30') GROUP BY nombre";

    $consulta7 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 31| 32| 33| 34| 35') GROUP BY nombre"; 
    $consulta8 = " select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 36| 37| 38| 39| 40') GROUP BY nombre";

    $consulta9 = "select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 41| 42| 43| 44| 45') GROUP BY nombre";
    $consulta10 = "select n_lista, nombre, count(*) as cantidad from test1 where match('@n_lista 46| 47| 48| 49| 50') GROUP BY nombre";
}

    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');

    $total_resultado= mysqli_query($con,$total_alumnos) or die('error en realizar la consulta');
    $total_respuesta=mysqli_fetch_array($total_resultado);
    
    $resultado1= mysqli_query($con,$consulta1) or die('error en realizar la consulta');
    $resultado2= mysqli_query($con,$consulta2) or die('error en realizar la consulta');
    $resultado3= mysqli_query($con,$consulta3) or die('error en realizar la consulta');
    $resultado4= mysqli_query($con,$consulta4) or die('error en realizar la consulta');
    $resultado5= mysqli_query($con,$consulta5) or die('error en realizar la consulta');
    $resultado6= mysqli_query($con,$consulta6) or die('error en realizar la consulta');
    $resultado7= mysqli_query($con,$consulta7) or die('error en realizar la consulta');
    $resultado8= mysqli_query($con,$consulta8) or die('error en realizar la consulta');
    $resultado9= mysqli_query($con,$consulta9) or die('error en realizar la consulta');
    $resultado10= mysqli_query($con,$consulta10) or die('error en realizar la consulta');
    
    
    //$array_alumnos = array();
    //$keys_array_alumnos = array();
    $suma=0;
    while ($respuesta1=mysqli_fetch_array($resultado1)) {
        $porcentaje=($respuesta1["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta1["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta2=mysqli_fetch_array($resultado2)) {
        $porcentaje=($respuesta2["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta2["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta3=mysqli_fetch_array($resultado3)) {
        $porcentaje=($respuesta3["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta3["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta4=mysqli_fetch_array($resultado4)) {
        $porcentaje=($respuesta4["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta4["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta5=mysqli_fetch_array($resultado5)) {
        $porcentaje=($respuesta5["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta5["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta6=mysqli_fetch_array($resultado6)) {
        $porcentaje=($respuesta6["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta6["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta7=mysqli_fetch_array($resultado7)) {
        $porcentaje=($respuesta7["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta7["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta8=mysqli_fetch_array($resultado8)) {
        $porcentaje=($respuesta8["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta8["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta9=mysqli_fetch_array($resultado9)) {
        $porcentaje=($respuesta9["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta9["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } 
    while ($respuesta10=mysqli_fetch_array($resultado10)) {
        $porcentaje=($respuesta10["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta10["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    }
    //$valor=$respuesta1["nombre"]; 
    $keys_array_alumnos=array_keys($array_alumnos);  
    $largo_key = sizeof($keys_array_alumnos);              

$datos = array(
'estado'=>'ok',
'estado1'=>'ok', 
'total_respuesta'=>$total_respuesta,
'array_alumnos' => $array_alumnos,
'keys_array_alumnos'=>$keys_array_alumnos,
'largo_key'=>$largo_key
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>