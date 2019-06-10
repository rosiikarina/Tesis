<?php
//Obtenemos los datos de los input
$variable = $_POST["variable"];

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array


//por una persona donde el usuario ingresa el nombre
if($_POST['variable']){
	$consulta1 = "select count(*) as cant1 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 miedo | preocupacion')";   
    $consulta2 = "select count(*) as cant2 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 ira | odio | envidia')";
    $consulta3 = "select count(*) as cant3 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 tristeza | resignacion')";
    $consulta4 = "select count(*) as cant4 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 culpa | verguenza')";

    $consulta5 = "select count(*) as cant5 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 confianza | esperanza')";  
    $consulta6 = "select count(*) as cant6 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 compasion | amor | gratitud')";
    $consulta7 = "select count(*) as cant7 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 alegria | entusiasmo')";
    $consulta8 = "select count(*) as cant8 from test1 where match('@nombre ".$_POST['variable']." @curso ".$_POST['variable2']." @pregunta1 autoestima | orgullo')";
}
    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    
    $resultado1= mysqli_query($con,$consulta1) or die('error en realizar la consulta');
    $resultado2= mysqli_query($con,$consulta2) or die('error en realizar la consulta');
    $resultado3= mysqli_query($con,$consulta3) or die('error en realizar la consulta');
    $resultado4= mysqli_query($con,$consulta4) or die('error en realizar la consulta');
    
    $resultado5= mysqli_query($con,$consulta5) or die('error en realizar la consulta');
    $resultado6= mysqli_query($con,$consulta6) or die('error en realizar la consulta');
    $resultado7= mysqli_query($con,$consulta7) or die('error en realizar la consulta');
    $resultado8= mysqli_query($con,$consulta8) or die('error en realizar la consulta');

    $respuesta1 = mysqli_fetch_array($resultado1);
    $respuesta2 = mysqli_fetch_array($resultado2);
    $respuesta3 = mysqli_fetch_array($resultado3);
    $respuesta4 = mysqli_fetch_array($resultado4);
    
    $respuesta5 = mysqli_fetch_array($resultado5);
    $respuesta6 = mysqli_fetch_array($resultado6);
    $respuesta7 = mysqli_fetch_array($resultado7);
    $respuesta8 = mysqli_fetch_array($resultado8);

    //array mas negativo
    $array_negativo=array();
    $array_positivo=array();
    //$data['var1'] = $value;

    if ($respuesta1["cant1"]==0) {
    	$var1=0;
    }else{
    	$var1=$respuesta1["cant1"];
    }
    //array_push($array_negativo, $var1);
    $array_negativo['miedo']=$var1;
    if ($respuesta2["cant2"]==0) {
    	$var2=0;
    }else{
    	$var2=$respuesta2["cant2"];
    }
    //array_push($array_negativo, $var2);
    $array_negativo['ira']=$var2;
    if ($respuesta3["cant3"]==0) {
    	$var3=0;
    }else{
    	$var3=$respuesta3["cant3"];
    }
    //array_push($array_negativo, $var3);
    $array_negativo['tristeza']=$var3;
    if ($respuesta4["cant4"]==0) {
    	$var4=0;
    }else{
    	$var4=$respuesta4["cant4"];
    }
    //array_push($array_negativo, $var4);
    $array_negativo['culpa']=$var4;

    if ($respuesta5["cant5"]==0) {
    	$var5=0;
    }else{
    	$var5=$respuesta5["cant5"];
    }
    //array_push($array_positivo, $var5);
    $array_positivo['confianza']=$var5;
    if ($respuesta6["cant6"]==0) {
    	$var6=0;
    }else{
    	$var6=$respuesta6["cant6"];
    }
    //array_push($array_positivo, $var6);
    $array_positivo['compasion']=$var6;
    if ($respuesta7["cant7"]==0) {
    	$var7=0;
    }else{
    	$var7=$respuesta7["cant7"];
    }
    //array_push($array_positivo, $var7);
    $array_positivo['alegria']=$var7;
    if ($respuesta8["cant8"]==0) {
    	$var8=0;
    }else{
    	$var8=$respuesta8["cant8"];
    }
    //array_push($array_positivo, $var8);
    $array_positivo['autoestima']=$var8;
    //se ordena cada array
    arsort($array_negativo);
    arsort($array_positivo);
    //var_export($array_negativo);

    //sort($array_positivo);

    $key_array_neg=key($array_negativo);
    $key_array_pos=key($array_positivo);
    if($key_array_neg=="miedo"){
        $emocion1_neg="miedo";
        $emocion2_neg="preocupacion";
        $emocion3_neg="nulo";
    }
    if($key_array_neg=="ira"){
        $emocion1_neg="ira";
        $emocion2_neg="odio";
        $emocion3_neg="envidia";
    }
    if($key_array_neg=="tristeza"){
        $emocion1_neg="tristeza";
        $emocion2_neg="resignacion";
        $emocion3_neg="nulo";
    }
    if($key_array_neg=="culpa"){
        $emocion1_neg="culpa";
        $emocion2_neg="verguenza";
        $emocion3_neg="nulo";
    }

    if($key_array_pos=="confianza"){
        $emocion1_pos="confianza";
        $emocion2_pos="esperanza";
        $emocion3_pos="nulo";
    }
    if($key_array_pos=="compasion"){
        $emocion1_pos="compasion";
        $emocion2_pos="amor";
        $emocion3_pos="gratitud";
    }
    if($key_array_pos=="alegria"){
        $emocion1_pos="alegria";
        $emocion2_pos="entusiasmo";
        $emocion3_pos="nulo";
    }
    if($key_array_pos=="autoestima"){
        $emocion1_pos="autoestima";
        $emocion2_pos="orgullo";
        $emocion3_pos="nulo";
    }
    //consulta por cada emocion, para saber cuantas veces se repite o si es que es solo una emocion de la categoria
    //array para guardar emocion y valor
    $consulta_emocion1_neg = "select count(*) as cantidad_emocion1 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion1_neg."')"; 
    $consulta_emocion2_neg = "select count(*) as cantidad_emocion2 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion2_neg."')";
    $consulta_emocion3_neg = "select count(*) as cantidad_emocion3 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion3_neg."')";
    $consulta_emocion1_pos = "select count(*) as cantidad_emocion4 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion1_pos."')"; 
    $consulta_emocion2_pos = "select count(*) as cantidad_emocion5 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion2_pos."')";
    $consulta_emocion3_pos = "select count(*) as cantidad_emocion6 from test1 where match('@nombre ".$_POST['variable']."  @curso ".$_POST['variable2']." @pregunta1 ".$emocion3_pos."')";
    $resultado_emocion1_neg= mysqli_query($con,$consulta_emocion1_neg) or die('error en realizar la consulta');
    $resultado_emocion2_neg= mysqli_query($con,$consulta_emocion2_neg) or die('error en realizar la consulta');
    $resultado_emocion3_neg= mysqli_query($con,$consulta_emocion3_neg) or die('error en realizar la consulta');
    $resultado_emocion1_pos= mysqli_query($con,$consulta_emocion1_pos) or die('error en realizar la consulta');
    $resultado_emocion2_pos= mysqli_query($con,$consulta_emocion2_pos) or die('error en realizar la consulta');
    $resultado_emocion3_pos= mysqli_query($con,$consulta_emocion3_pos) or die('error en realizar la consulta');
    $respuesta_emocion1_neg = mysqli_fetch_array($resultado_emocion1_neg);
    $respuesta_emocion2_neg = mysqli_fetch_array($resultado_emocion2_neg);
    $respuesta_emocion3_neg = mysqli_fetch_array($resultado_emocion3_neg);
    $respuesta_emocion1_pos = mysqli_fetch_array($resultado_emocion1_pos);
    $respuesta_emocion2_pos = mysqli_fetch_array($resultado_emocion2_pos);
    $respuesta_emocion3_pos = mysqli_fetch_array($resultado_emocion3_pos);
    $array_emociones_neg=array();
    $array_emociones_pos=array();
    $array_emociones_neg[$emocion1_neg]=$respuesta_emocion1_neg["cantidad_emocion1"];
    $array_emociones_neg[$emocion2_neg]=$respuesta_emocion2_neg["cantidad_emocion2"];
    $array_emociones_neg[$emocion3_neg]=$respuesta_emocion3_neg["cantidad_emocion3"];
    $array_emociones_pos[$emocion1_pos]=$respuesta_emocion1_pos["cantidad_emocion4"];
    $array_emociones_pos[$emocion2_pos]=$respuesta_emocion2_pos["cantidad_emocion5"];
    $array_emociones_pos[$emocion3_pos]=$respuesta_emocion3_pos["cantidad_emocion6"];

    $keys_emociones_neg=array_keys($array_emociones_neg);
    $keys_emociones_pos=array_keys($array_emociones_pos);


  

$estado1='ok';
$estado2='ok';
 if(($var1+$var2+$var3+$var4)==0) {
 	$estado1='nulo';
 } 
 if(($var5+$var6+$var7+$var8)==0) {
 	$estado2='nulo';
 }           


$datos = array(
'estado'=>'ok',
'estado1' => $estado1,
'estado2' => $estado2,											
'variable' => $variable,
'consult1' => $var1,
'consult2' => $var2,
'consult3' => $var3,
'consult4' => $var4,
'consult5' => $var5,
'consult6' => $var6,
'consult7' => $var7,
'consult8' => $var8,
'array_emociones_neg'=>$array_emociones_neg,
'keys_emociones_neg'=>$keys_emociones_neg,
'array_emociones_pos'=>$array_emociones_pos,
'keys_emociones_pos'=>$keys_emociones_pos
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>
