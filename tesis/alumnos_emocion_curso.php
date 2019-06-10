<?php
//Obtenemos los datos de los input
$variable = $_POST["variable"];

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array

//por curso seleccionar todos los nombres de los alumnos
if($_POST['variable']){
    //se calcula el total de alumnos en cierta categoria de emocion para luego calcular el porcentaje
    $total_alumnos_miedo = "select count(*) as total from test1 where match('@pregunta1 miedo|preocupacion @curso "+$_POST['variable']+"')"; 
    $total_alumnos_confianza = "select count(*) as total from test1 where match('@pregunta1 confianza|esperanza @curso "+$_POST['variable']+"')"; 
    $total_alumnos_ira = "select count(*) as total from test1 where match('@pregunta1 ira|odio|envidia @curso "+$_POST['variable']+"')"; 
    $total_alumnos_compasion = "select count(*) as total from test1 where match('@pregunta1 compasion|amor|gratitud @curso "+$_POST['variable']+"')";  
    $total_alumnos_tristeza = "select count(*) as total from test1 where match('@pregunta1 tristeza|resignacion @curso "+$_POST['variable']+"')"; 
    $total_alumnos_alegria = "select count(*) as total from test1 where match('@pregunta1 alegria|entusiasmo @curso "+$_POST['variable']+"')"; 
    $total_alumnos_culpa = "select count(*) as total from test1 where match('@pregunta1 culpa|verguenza @curso "+$_POST['variable']+"')"; 
    $total_alumnos_autoestima = "select count(*) as total from test1 where match('@pregunta1 autoestima|orgullo @curso "+$_POST['variable']+"')"; 
    //se realiza la consulta para agrupar la emocion por cada alumno
    $consulta_miedo = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 miedo|preocupacion  @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_confianza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 confianza|esperanza  @curso "+$_POST['variable']+"') GROUP BY nombre";
	$consulta_ira = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 ira|odio|envidia @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_compasion = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 compasion|amor|gratitud @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_tristeza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 tristeza|resignacion @curso "+$_POST['variable']+"') GROUP BY nombre";
    
    $consulta_culpa = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 culpa|verguenza @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_autoestima = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 autoestima|orgullo @curso "+$_POST['variable']+"') GROUP BY nombre";

    
    $consulta_alegria1 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 0|1|2|3|4|5|6|7|8|9 @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_alegria2 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 10|11|12|13|14|15|16|17|18|19 @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_alegria3 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 20|21|22|23|24|25|26|27|28|29 @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_alegria4 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 30|31|32|33|34|35|36|37|38|39 @curso "+$_POST['variable']+"') GROUP BY nombre";
    $consulta_alegria5 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 40|41|42|43|44|45|46|47|48|49|50 @curso "+$_POST['variable']+"') GROUP BY nombre";
    
}

    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');

    $total_resultado_miedo= mysqli_query($con,$total_alumnos_miedo) or die('error en realizar la consulta');
    $total_resultado_confianza= mysqli_query($con,$total_alumnos_confianza) or die('error en realizar la consulta');
    $total_resultado_ira= mysqli_query($con,$total_alumnos_ira) or die('error en realizar la consulta');
    $total_resultado_compasion= mysqli_query($con,$total_alumnos_compasion) or die('error en realizar la consulta');
    $total_resultado_tristeza= mysqli_query($con,$total_alumnos_tristeza) or die('error en realizar la consulta');
    $total_resultado_alegria= mysqli_query($con,$total_alumnos_alegria) or die('error en realizar la consulta');
    $total_resultado_culpa= mysqli_query($con,$total_alumnos_culpa) or die('error en realizar la consulta');
    $total_resultado_autoestima= mysqli_query($con,$total_alumnos_autoestima) or die('error en realizar la consulta');

    $total_respuesta_miedo=mysqli_fetch_array($total_resultado_miedo);
    $total_respuesta_confianza=mysqli_fetch_array($total_resultado_confianza);
    $total_respuesta_ira=mysqli_fetch_array($total_resultado_ira);
    $total_respuesta_compasion=mysqli_fetch_array($total_resultado_compasion);
    $total_respuesta_tristeza=mysqli_fetch_array($total_resultado_tristeza);
    $total_respuesta_alegria=mysqli_fetch_array($total_resultado_alegria);
    $total_respuesta_culpa=mysqli_fetch_array($total_resultado_culpa);
    $total_respuesta_autoestima=mysqli_fetch_array($total_resultado_autoestima);
    
    $resultado_miedo= mysqli_query($con,$consulta_miedo) or die('error en realizar la consulta');
    $resultado_confianza= mysqli_query($con,$consulta_confianza) or die('error en realizar la consulta');
    $resultado_ira= mysqli_query($con,$consulta_ira) or die('error en realizar la consulta');
    $resultado_compasion= mysqli_query($con,$consulta_compasion) or die('error en realizar la consulta');
    $resultado_tristeza= mysqli_query($con,$consulta_tristeza) or die('error en realizar la consulta');
   
    $resultado_culpa= mysqli_query($con,$consulta_culpa) or die('error en realizar la consulta');
    $resultado_autoestima= mysqli_query($con,$consulta_autoestima) or die('error en realizar la consulta');

    $resultado_alegria1= mysqli_query($con,$consulta_alegria1) or die('error en realizar la consulta');
    $resultado_alegria2= mysqli_query($con,$consulta_alegria2) or die('error en realizar la consulta');
    $resultado_alegria3= mysqli_query($con,$consulta_alegria3) or die('error en realizar la consulta');
    $resultado_alegria4= mysqli_query($con,$consulta_alegria4) or die('error en realizar la consulta');
    $resultado_alegria5= mysqli_query($con,$consulta_alegria5) or die('error en realizar la consulta');
    
    //$suma=0;
    while ($respuesta_miedo=mysqli_fetch_array($resultado_miedo)) {
        $porcentaje=($respuesta_miedo["cantidad"]*100)/$total_respuesta_miedo["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_miedo[$respuesta_miedo["nombre"]]=$porcentaje;
        //$suma=$suma+$porcentaje;
        //$suma = bcdiv($suma,'1',2);
    }
    while ($respuesta_confianza=mysqli_fetch_array($resultado_confianza)) {
        $porcentaje=($respuesta_confianza["cantidad"]*100)/$total_respuesta_confianza["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_confianza[$respuesta_confianza["nombre"]]=$porcentaje;
    }
    while ($respuesta_ira=mysqli_fetch_array($resultado_ira)) {
        $porcentaje=($respuesta_ira["cantidad"]*100)/$total_respuesta_ira["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_ira[$respuesta_ira["nombre"]]=$porcentaje;
    }
    while ($respuesta_compasion=mysqli_fetch_array($resultado_compasion)) {
        $porcentaje=($respuesta_compasion["cantidad"]*100)/$total_respuesta_compasion["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_compasion[$respuesta_compasion["nombre"]]=$porcentaje;
    }
    while ($respuesta_tristeza=mysqli_fetch_array($resultado_tristeza)) {
        $porcentaje=($respuesta_tristeza["cantidad"]*100)/$total_respuesta_tristeza["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_tristeza[$respuesta_tristeza["nombre"]]=$porcentaje;
    }
    
    while ($respuesta_culpa=mysqli_fetch_array($resultado_culpa)) {
        $porcentaje=($respuesta_culpa["cantidad"]*100)/$total_respuesta_culpa["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_culpa[$respuesta_culpa["nombre"]]=$porcentaje;
    }
    while ($respuesta_autoestima=mysqli_fetch_array($resultado_autoestima)) {
        $porcentaje=($respuesta_autoestima["cantidad"]*100)/$total_respuesta_autoestima["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos_autoestima[$respuesta_autoestima["nombre"]]=$porcentaje;
    }
   // $suma=0;
    while ($respuesta_alegria1=mysqli_fetch_array($resultado_alegria1)) {
        $porcentaje=($respuesta_alegria1["cantidad"]*100)/$total_respuesta_alegria["total"];
        $porcentaje = bcdiv($porcentaje, '1', 4);
        $array_alumnos_alegria[$respuesta_alegria1["nombre"]]=$porcentaje;
     //   $suma=$suma+$porcentaje;
       // $suma = bcdiv($suma,'1',4);
    }
    while ($respuesta_alegria2=mysqli_fetch_array($resultado_alegria2)) {
        $porcentaje=($respuesta_alegria2["cantidad"]*100)/$total_respuesta_alegria["total"];
        $porcentaje = bcdiv($porcentaje, '1', 4);
        $array_alumnos_alegria[$respuesta_alegria2["nombre"]]=$porcentaje;
        //$suma=$suma+$porcentaje;
        //$suma = bcdiv($suma,'1',4);
    }
    while ($respuesta_alegria3=mysqli_fetch_array($resultado_alegria3)) {
        $porcentaje=($respuesta_alegria3["cantidad"]*100)/$total_respuesta_alegria["total"];
        $porcentaje = bcdiv($porcentaje, '1', 4);
        $array_alumnos_alegria[$respuesta_alegria3["nombre"]]=$porcentaje;
        //$suma=$suma+$porcentaje;
        //$suma = bcdiv($suma,'1',4);
    }
    while ($respuesta_alegria4=mysqli_fetch_array($resultado_alegria4)) {
        $porcentaje=($respuesta_alegria4["cantidad"]*100)/$total_respuesta_alegria["total"];
        $porcentaje = bcdiv($porcentaje, '1', 4);
        $array_alumnos_alegria[$respuesta_alegria4["nombre"]]=$porcentaje;
        //$suma=$suma+$porcentaje;
        //$suma = bcdiv($suma,'1',4);
    }
    while ($respuesta_alegria5=mysqli_fetch_array($resultado_alegria5)) {
        $porcentaje=($respuesta_alegria5["cantidad"]*100)/$total_respuesta_alegria["total"];
        $porcentaje = bcdiv($porcentaje, '1', 4);
        $array_alumnos_alegria[$respuesta_alegria5["nombre"]]=$porcentaje;
        //$suma=$suma+$porcentaje;
        //$suma = bcdiv($suma,'1',4);
    }
    
    //$array_alumnos = array();
    //$keys_array_alumnos = array();
   /* $suma=0;
    while ($respuesta1=mysqli_fetch_array($resultado1)) {
        $porcentaje=($respuesta1["cantidad"]*100)/$total_respuesta["total"];
        $porcentaje = bcdiv($porcentaje, '1', 2);
        $array_alumnos[$respuesta1["nombre"]]=$porcentaje;
        $suma=$suma+$porcentaje;
        $suma = bcdiv($suma,'1',2);
    } */
    
    //$valor=$respuesta1["nombre"]; 
   $keys_array_alumnos_miedo=array_keys($array_alumnos_miedo);  
   //$keys_array_alumnos_confianza=array_keys($array_alumnos_confianza);  
   $keys_array_alumnos_ira=array_keys($array_alumnos_ira);  
   $keys_array_alumnos_compasion=array_keys($array_alumnos_compasion);  
   $keys_array_alumnos_tristeza=array_keys($array_alumnos_tristeza);  
   $keys_array_alumnos_alegria=array_keys($array_alumnos_alegria);  
   //$keys_array_alumnos_culpa=array_keys($array_alumnos_culpa);  
   $keys_array_alumnos_autoestima=array_keys($array_alumnos_autoestima);  
    $largo_key_miedo = sizeof($keys_array_alumnos_miedo);              
    //$largo_key_confianza = sizeof($keys_array_alumnos_confianza);              
    $largo_key_ira = sizeof($keys_array_alumnos_ira);              
    $largo_key_compasion = sizeof($keys_array_alumnos_compasion);              
    $largo_key_tristeza = sizeof($keys_array_alumnos_tristeza); 
                 
    $largo_key_alegria = sizeof($keys_array_alumnos_alegria);              
    //$largo_key_culpa = sizeof($keys_array_alumnos_culpa);              
    $largo_key_autoestima = sizeof($keys_array_alumnos_autoestima);              

$datos = array(
'estado'=>'ok',
'estado1'=>'ok', 
'array_alumnos_miedo'=>$array_alumnos_miedo,
//'array_alumnos_confianza'=>$array_alumnos_confianza,
'array_alumnos_ira'=>$array_alumnos_ira,
'array_alumnos_compasion'=>$array_alumnos_compasion,
'array_alumnos_tristeza'=>$array_alumnos_tristeza,
'array_alumnos_alegria'=>$array_alumnos_alegria,
//'array_alumnos_culpa'=>$array_alumnos_culpa,
'array_alumnos_autoestima'=>$array_alumnos_autoestima,
'keys_array_alumnos_miedo'=>$keys_array_alumnos_miedo,
//'keys_array_alumnos_confianza'=>$keys_array_alumnos_confianza,
'keys_array_alumnos_ira'=>$keys_array_alumnos_ira,
'keys_array_alumnos_compasion'=>$keys_array_alumnos_compasion,
'keys_array_alumnos_tristeza'=>$keys_array_alumnos_tristeza,
'keys_array_alumnos_alegria'=>$keys_array_alumnos_alegria,
//'keys_array_alumnos_culpa'=>$keys_array_alumnos_culpa,
'keys_array_alumnos_autoestima'=>$keys_array_alumnos_autoestima,
'largo_key_miedo'=>$largo_key_miedo,
//'largo_key_confianza'=>$largo_key_confianza,
'largo_key_ira'=>$largo_key_ira,
'largo_key_compasion'=>$largo_key_compasion,
'largo_key_tristeza'=>$largo_key_tristeza,
'largo_key_alegria'=>$largo_key_alegria,
//'largo_key_culpa'=>$largo_key_culpa,
'largo_key_autoestima'=>$largo_key_autoestima
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>