<?php
//Obtenemos los datos de los input
$variable = $_POST["curso"];



//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array


//por curso seleccionar todos los nombres de los alumnos
if($_POST['curso']){
	$consulta1 = "select count(*),nombre from test1 where match('@curso ".$_POST['curso']."') group by nombre";   
}

    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    
    $resultado1= mysqli_query($con,$consulta1) or die('error en realizar la consulta');
    
    //$respuesta1 = mysqli_fetch_array($resultado1);
    //$valor=$respuesta1["nombre"];
    $ar=array();
    while($consulta = mysqli_fetch_array($resultado1)){
                      array_push($ar, $consulta['nombre']);

                        //$ar=$consulta['nombre'];
                    }
    $largo=sizeof($ar);
                           
                      


$datos = array(
'estado'=>'ok',
'resultado1' => $ar,
'largo_arreglo' => $largo,

);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>