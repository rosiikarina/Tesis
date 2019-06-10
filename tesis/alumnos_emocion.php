<?php
//Obtenemos los datos de los input
$variable = $_POST["variable"];

//Seteamos el header de "content-type" como "JSON" para que jQuery lo reconozca como tal
header('Content-Type: application/json');
//Guardamos los datos en un array

//por curso seleccionar todos los nombres de los alumnos
if($_POST['variable']=="Todos"){
    //se calcula el total de alumnos en cierta categoria de emocion para luego calcular el porcentaje
    $total_alumnos_miedo = "select count(*) as total from test1 where match('@pregunta1 miedo|preocupacion')"; 
    $total_alumnos_confianza = "select count(*) as total from test1 where match('@pregunta1 confianza|esperanza')"; 
    $total_alumnos_ira = "select count(*) as total from test1 where match('@pregunta1 ira|odio|envidia')"; 
    $total_alumnos_compasion = "select count(*) as total from test1 where match('@pregunta1 compasion|amor|gratitud')";  
    $total_alumnos_tristeza = "select count(*) as total from test1 where match('@pregunta1 tristeza|resignacion')"; 
    $total_alumnos_alegria = "select count(*) as total from test1 where match('@pregunta1 alegria|entusiasmo')"; 
    $total_alumnos_culpa = "select count(*) as total from test1 where match('@pregunta1 culpa|verguenza')"; 
    $total_alumnos_autoestima = "select count(*) as total from test1 where match('@pregunta1 autoestima|orgullo')"; 
    //se realiza la consulta para agrupar la emocion por cada alumno
    $consulta_miedo = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 miedo|preocupacion') GROUP BY nombre";
    $consulta_confianza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 confianza|esperanza') GROUP BY nombre";
	$consulta_ira = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 ira|odio|envidia') GROUP BY nombre";
    $consulta_compasion = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 compasion|amor|gratitud') GROUP BY nombre";
    $consulta_tristeza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 tristeza|resignacion') GROUP BY nombre";
    
    $consulta_culpa = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 culpa|verguenza') GROUP BY nombre";
    $consulta_autoestima = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 autoestima|orgullo') GROUP BY nombre";

    
    $consulta_alegria1 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 0|1|2|3|4|5|6|7|8|9') GROUP BY nombre";
    $consulta_alegria2 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 10|11|12|13|14|15|16|17|18|19') GROUP BY nombre";
    $consulta_alegria3 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 20|21|22|23|24|25|26|27|28|29') GROUP BY nombre";
    $consulta_alegria4 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 30|31|32|33|34|35|36|37|38|39') GROUP BY nombre";
    $consulta_alegria5 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 40|41|42|43|44|45|46|47|48|49|50') GROUP BY nombre";
    
}
if ($_POST['variable']!="Todos") {
    $total_alumnos_miedo = "select count(*) as total from test1 where match('@pregunta1 miedo|preocupacion @curso ".$_POST['variable']."')"; 
    $total_alumnos_confianza = "select count(*) as total from test1 where match('@pregunta1 confianza|esperanza @curso ".$_POST['variable']."')"; 
    $total_alumnos_ira = "select count(*) as total from test1 where match('@pregunta1 ira|odio|envidia @curso ".$_POST['variable']."')"; 
    $total_alumnos_compasion = "select count(*) as total from test1 where match('@pregunta1 compasion|amor|gratitud @curso ".$_POST['variable']."')";  
    $total_alumnos_tristeza = "select count(*) as total from test1 where match('@pregunta1 tristeza|resignacion @curso ".$_POST['variable']."')"; 
    $total_alumnos_alegria = "select count(*) as total from test1 where match('@pregunta1 alegria|entusiasmo @curso ".$_POST['variable']."')"; 
    $total_alumnos_culpa = "select count(*) as total from test1 where match('@pregunta1 culpa|verguenza @curso ".$_POST['variable']."')"; 
    $total_alumnos_autoestima = "select count(*) as total from test1 where match('@pregunta1 autoestima|orgullo @curso ".$_POST['variable']."')"; 
    //se realiza la consulta para agrupar la emocion por cada alumno
    $consulta_miedo = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 miedo|preocupacion  @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_confianza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 confianza|esperanza  @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_ira = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 ira|odio|envidia @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_compasion = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 compasion|amor|gratitud @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_tristeza = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 tristeza|resignacion @curso ".$_POST['variable']."') GROUP BY nombre";
    
    $consulta_culpa = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 culpa|verguenza @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_autoestima = " select nombre, count(*) as cantidad from test1 where match('@pregunta1 autoestima|orgullo @curso ".$_POST['variable']."') GROUP BY nombre";

    
    $consulta_alegria1 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 0|1|2|3|4|5|6|7|8|9 @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_alegria2 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 10|11|12|13|14|15|16|17|18|19 @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_alegria3 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 20|21|22|23|24|25|26|27|28|29 @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_alegria4 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 30|31|32|33|34|35|36|37|38|39 @curso ".$_POST['variable']."') GROUP BY nombre";
    $consulta_alegria5 = "select nombre, count(*) as cantidad from test1 where match('@pregunta1 alegria|entusiasmo @n_lista 40|41|42|43|44|45|46|47|48|49|50 @curso ".$_POST['variable']."') GROUP BY nombre";
    
}
    $consulta_curso_alegria_ago = "select curso, count(*) cant_alegria from test1 where match('@fecha ago @pregunta1 alegria|entusiasmo')group by curso order by curso asc";
    $consulta_curso_alegria_sep = "select curso, count(*) cant_alegria from test1 where match('@fecha sep -ago @pregunta1 alegria|entusiasmo')group by curso order by curso asc";
    $consulta_curso_alegria_oct = "select curso, count(*) cant_alegria from test1 where match('@fecha oct @pregunta1 alegria|entusiasmo')group by curso order by curso asc";
    $consulta_curso_alegria_nov = "select curso, count(*) cant_alegria from test1 where match('@fecha nov @pregunta1 alegria|entusiasmo')group by curso order by curso asc";

    $consulta_curso_tristeza_ago = "select curso, count(*) cant_tristeza from test1 where match('@fecha ago @pregunta1 tristeza|resignacion')group by curso order by curso asc";
    $consulta_curso_tristeza_sep = "select curso, count(*) cant_tristeza from test1 where match('@fecha sep -ago @pregunta1 tristeza|resignacion')group by curso order by curso asc";
    $consulta_curso_tristeza_oct = "select curso, count(*) cant_tristeza from test1 where match('@fecha oct @pregunta1 tristeza|resignacion')group by curso order by curso asc";
    $consulta_curso_tristeza_nov = "select curso, count(*) cant_tristeza from test1 where match('@fecha nov @pregunta1 tristeza|resignacion')group by curso order by curso asc";

    $consulta_curso_confianza_ago = "select curso, count(*) cant_confianza from test1 where match('@fecha ago @pregunta1 confianza|esperanza')group by curso order by curso asc";
    $consulta_curso_confianza_sep = "select curso, count(*) cant_confianza from test1 where match('@fecha sep -ago @pregunta1 confianza|esperanza')group by curso order by curso asc";
    $consulta_curso_confianza_oct = "select curso, count(*) cant_confianza from test1 where match('@fecha oct @pregunta1 confianza|esperanza')group by curso order by curso asc";
    $consulta_curso_confianza_nov = "select curso, count(*) cant_confianza from test1 where match('@fecha nov @pregunta1 confianza|esperanza')group by curso order by curso asc";

    $consulta_curso_miedo_ago = "select curso, count(*) cant_miedo from test1 where match('@fecha ago @pregunta1 miedo|preocupacion')group by curso order by curso asc";
    $consulta_curso_miedo_sep = "select curso, count(*) cant_miedo from test1 where match('@fecha sep -ago @pregunta1 miedo|preocupacion')group by curso order by curso asc";
    $consulta_curso_miedo_oct = "select curso, count(*) cant_miedo from test1 where match('@fecha oct @pregunta1 miedo|preocupacion')group by curso order by curso asc";
    $consulta_curso_miedo_nov = "select curso, count(*) cant_miedo from test1 where match('@fecha nov @pregunta1 miedo|preocupacion')group by curso order by curso asc";

    $consulta_curso_compasion_ago = "select curso, count(*) cant_compasion from test1 where match('@fecha ago @pregunta1 compasion|amor|gratitud')group by curso order by curso asc";
    $consulta_curso_compasion_sep = "select curso, count(*) cant_compasion from test1 where match('@fecha sep -ago @pregunta1 compasion|amor|gratitud')group by curso order by curso asc";
    $consulta_curso_compasion_oct = "select curso, count(*) cant_compasion from test1 where match('@fecha oct @pregunta1 compasion|amor|gratitud')group by curso order by curso asc";
    $consulta_curso_compasion_nov = "select curso, count(*) cant_compasion from test1 where match('@fecha nov @pregunta1 compasion|amor|gratitud')group by curso order by curso asc";

    $consulta_curso_ira_ago = "select curso, count(*) cant_ira from test1 where match('@fecha ago @pregunta1 ira|odio|envidia')group by curso order by curso asc";
    $consulta_curso_ira_sep = "select curso, count(*) cant_ira from test1 where match('@fecha sep -ago @pregunta1 ira|odio|envidia')group by curso order by curso asc";
    $consulta_curso_ira_oct = "select curso, count(*) cant_ira from test1 where match('@fecha oct @pregunta1 ira|odio|envidia')group by curso order by curso asc";
    $consulta_curso_ira_nov = "select curso, count(*) cant_ira from test1 where match('@fecha nov @pregunta1 ira|odio|envidia')group by curso order by curso asc";

    $consulta_curso_autoestima_ago = "select curso, count(*) cant_autoestima from test1 where match('@fecha ago @pregunta1 autoestima|orgullo')group by curso order by curso asc";
    $consulta_curso_autoestima_sep = "select curso, count(*) cant_autoestima from test1 where match('@fecha sep -ago @pregunta1 autoestima|orgullo')group by curso order by curso asc";
    $consulta_curso_autoestima_oct = "select curso, count(*) cant_autoestima from test1 where match('@fecha oct @pregunta1 autoestima|orgullo')group by curso order by curso asc";
    $consulta_curso_autoestima_nov = "select curso, count(*) cant_autoestima from test1 where match('@fecha nov @pregunta1 autoestima|orgullo')group by curso order by curso asc";

    $consulta_curso_culpa_ago = "select curso, count(*) cant_culpa from test1 where match('@fecha ago @pregunta1 culpa|verguenza')group by curso order by curso asc";
    $consulta_curso_culpa_sep = "select curso, count(*) cant_culpa from test1 where match('@fecha sep -ago @pregunta1 culpa|verguenza')group by curso order by curso asc";
    $consulta_curso_culpa_oct = "select curso, count(*) cant_culpa from test1 where match('@fecha oct @pregunta1 culpa|verguenza')group by curso order by curso asc";
    $consulta_curso_culpa_nov = "select curso, count(*) cant_culpa from test1 where match('@fecha nov @pregunta1 culpa|verguenza')group by curso order by curso asc";

    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');

    $resultado_curso_alegria_ago= mysqli_query($con,$consulta_curso_alegria_ago) or die('error en realizar la consulta');
    $resultado_curso_alegria_sep= mysqli_query($con,$consulta_curso_alegria_sep) or die('error en realizar la consulta');
    $resultado_curso_alegria_oct= mysqli_query($con,$consulta_curso_alegria_oct) or die('error en realizar la consulta');
    $resultado_curso_alegria_nov= mysqli_query($con,$consulta_curso_alegria_nov) or die('error en realizar la consulta');
    
    $resultado_curso_tristeza_ago= mysqli_query($con,$consulta_curso_tristeza_ago) or die('error en realizar la consulta');
    $resultado_curso_tristeza_sep= mysqli_query($con,$consulta_curso_tristeza_sep) or die('error en realizar la consulta');
    $resultado_curso_tristeza_oct= mysqli_query($con,$consulta_curso_tristeza_oct) or die('error en realizar la consulta');
    $resultado_curso_tristeza_nov= mysqli_query($con,$consulta_curso_tristeza_nov) or die('error en realizar la consulta');
    
    $resultado_curso_confianza_ago= mysqli_query($con,$consulta_curso_confianza_ago) or die('error en realizar la consulta');
    $resultado_curso_confianza_sep= mysqli_query($con,$consulta_curso_confianza_sep) or die('error en realizar la consulta');
    $resultado_curso_confianza_oct= mysqli_query($con,$consulta_curso_confianza_oct) or die('error en realizar la consulta');
    $resultado_curso_confianza_nov= mysqli_query($con,$consulta_curso_confianza_nov) or die('error en realizar la consulta');
    
    $resultado_curso_miedo_ago= mysqli_query($con,$consulta_curso_miedo_ago) or die('error en realizar la consulta');
    $resultado_curso_miedo_sep= mysqli_query($con,$consulta_curso_miedo_sep) or die('error en realizar la consulta');
    $resultado_curso_miedo_oct= mysqli_query($con,$consulta_curso_miedo_oct) or die('error en realizar la consulta');
    $resultado_curso_miedo_nov= mysqli_query($con,$consulta_curso_miedo_nov) or die('error en realizar la consulta');
    
    $resultado_curso_compasion_ago= mysqli_query($con,$consulta_curso_compasion_ago) or die('error en realizar la consulta');
    $resultado_curso_compasion_sep= mysqli_query($con,$consulta_curso_compasion_sep) or die('error en realizar la consulta');
    $resultado_curso_compasion_oct= mysqli_query($con,$consulta_curso_compasion_oct) or die('error en realizar la consulta');
    $resultado_curso_compasion_nov= mysqli_query($con,$consulta_curso_compasion_nov) or die('error en realizar la consulta');
    
    $resultado_curso_ira_ago= mysqli_query($con,$consulta_curso_ira_ago) or die('error en realizar la consulta');
    $resultado_curso_ira_sep= mysqli_query($con,$consulta_curso_ira_sep) or die('error en realizar la consulta');
    $resultado_curso_ira_oct= mysqli_query($con,$consulta_curso_ira_oct) or die('error en realizar la consulta');
    $resultado_curso_ira_nov= mysqli_query($con,$consulta_curso_ira_nov) or die('error en realizar la consulta');
    
    $resultado_curso_autoestima_ago= mysqli_query($con,$consulta_curso_autoestima_ago) or die('error en realizar la consulta');
    $resultado_curso_autoestima_sep= mysqli_query($con,$consulta_curso_autoestima_sep) or die('error en realizar la consulta');
    $resultado_curso_autoestima_oct= mysqli_query($con,$consulta_curso_autoestima_oct) or die('error en realizar la consulta');
    $resultado_curso_autoestima_nov= mysqli_query($con,$consulta_curso_autoestima_nov) or die('error en realizar la consulta');
    
    $resultado_curso_culpa_ago= mysqli_query($con,$consulta_curso_culpa_ago) or die('error en realizar la consulta');
    $resultado_curso_culpa_sep= mysqli_query($con,$consulta_curso_culpa_sep) or die('error en realizar la consulta');
    $resultado_curso_culpa_oct= mysqli_query($con,$consulta_curso_culpa_oct) or die('error en realizar la consulta');
    $resultado_curso_culpa_nov= mysqli_query($con,$consulta_curso_culpa_nov) or die('error en realizar la consulta');



    while ($respuesta_curso_alegria_ago=mysqli_fetch_array($resultado_curso_alegria_ago)) {
        $array_curso_alegria_ago[$respuesta_curso_alegria_ago["curso"]]=$respuesta_curso_alegria_ago["cant_alegria"];
    }
    while ($respuesta_curso_alegria_sep=mysqli_fetch_array($resultado_curso_alegria_sep)) {
        $array_curso_alegria_sep[$respuesta_curso_alegria_sep["curso"]]=$respuesta_curso_alegria_sep["cant_alegria"];
    }
    while ($respuesta_curso_alegria_oct=mysqli_fetch_array($resultado_curso_alegria_oct)) {
        $array_curso_alegria_oct[$respuesta_curso_alegria_oct["curso"]]=$respuesta_curso_alegria_oct["cant_alegria"];
    }
    while ($respuesta_curso_alegria_nov=mysqli_fetch_array($resultado_curso_alegria_nov)) {
        $array_curso_alegria_nov[$respuesta_curso_alegria_nov["curso"]]=$respuesta_curso_alegria_nov["cant_alegria"];
    }

    while ($respuesta_curso_tristeza_ago=mysqli_fetch_array($resultado_curso_tristeza_ago)) {
        $array_curso_tristeza_ago[$respuesta_curso_tristeza_ago["curso"]]=$respuesta_curso_tristeza_ago["cant_tristeza"];
    }
    while ($respuesta_curso_tristeza_sep=mysqli_fetch_array($resultado_curso_tristeza_sep)) {
        $array_curso_tristeza_sep[$respuesta_curso_tristeza_sep["curso"]]=$respuesta_curso_tristeza_sep["cant_tristeza"];
    }
    while ($respuesta_curso_tristeza_oct=mysqli_fetch_array($resultado_curso_tristeza_oct)) {
        $array_curso_tristeza_oct[$respuesta_curso_tristeza_oct["curso"]]=$respuesta_curso_tristeza_oct["cant_tristeza"];
    }
    while ($respuesta_curso_tristeza_nov=mysqli_fetch_array($resultado_curso_tristeza_nov)) {
        $array_curso_tristeza_nov[$respuesta_curso_tristeza_nov["curso"]]=$respuesta_curso_tristeza_nov["cant_tristeza"];
    }

    while ($respuesta_curso_confianza_ago=mysqli_fetch_array($resultado_curso_confianza_ago)) {
        $array_curso_confianza_ago[$respuesta_curso_confianza_ago["curso"]]=$respuesta_curso_confianza_ago["cant_confianza"];
    }
    while ($respuesta_curso_confianza_sep=mysqli_fetch_array($resultado_curso_confianza_sep)) {
        $array_curso_confianza_sep[$respuesta_curso_confianza_sep["curso"]]=$respuesta_curso_confianza_sep["cant_confianza"];
    }
    while ($respuesta_curso_confianza_oct=mysqli_fetch_array($resultado_curso_confianza_oct)) {
        $array_curso_confianza_oct[$respuesta_curso_confianza_oct["curso"]]=$respuesta_curso_confianza_oct["cant_confianza"];
    }
    while ($respuesta_curso_confianza_nov=mysqli_fetch_array($resultado_curso_confianza_nov)) {
        $array_curso_confianza_nov[$respuesta_curso_confianza_nov["curso"]]=$respuesta_curso_confianza_nov["cant_confinza"];
    }

    while ($respuesta_curso_miedo_ago=mysqli_fetch_array($resultado_curso_miedo_ago)) {
        $array_curso_miedo_ago[$respuesta_curso_miedo_ago["curso"]]=$respuesta_curso_miedo_ago["cant_miedo"];
    }
    while ($respuesta_curso_miedo_sep=mysqli_fetch_array($resultado_curso_miedo_sep)) {
        $array_curso_miedo_sep[$respuesta_curso_miedo_sep["curso"]]=$respuesta_curso_miedo_sep["cant_miedo"];
    }
    while ($respuesta_curso_miedo_oct=mysqli_fetch_array($resultado_curso_miedo_oct)) {
        $array_curso_miedo_oct[$respuesta_curso_miedo_oct["curso"]]=$respuesta_curso_miedo_oct["cant_miedo"];
    }
    while ($respuesta_curso_miedo_nov=mysqli_fetch_array($resultado_curso_miedo_nov)) {
        $array_curso_miedo_nov[$respuesta_curso_miedo_nov["curso"]]=$respuesta_curso_miedo_nov["cant_miedo"];
    }

    while ($respuesta_curso_compasion_ago=mysqli_fetch_array($resultado_curso_compasion_ago)) {
        $array_curso_compasion_ago[$respuesta_curso_compasion_ago["curso"]]=$respuesta_curso_compasion_ago["cant_compasion"];
    }
    while ($respuesta_curso_compasion_sep=mysqli_fetch_array($resultado_curso_compasion_sep)) {
        $array_curso_compasion_sep[$respuesta_curso_compasion_sep["curso"]]=$respuesta_curso_compasion_sep["cant_compasion"];
    }
    while ($respuesta_curso_compasion_oct=mysqli_fetch_array($resultado_curso_compasion_oct)) {
        $array_curso_compasion_oct[$respuesta_curso_compasion_oct["curso"]]=$respuesta_curso_compasion_oct["cant_compasion"];
    }
    while ($respuesta_curso_compasion_nov=mysqli_fetch_array($resultado_curso_compasion_nov)) {
        $array_curso_compasion_nov[$respuesta_curso_compasion_nov["curso"]]=$respuesta_curso_compasion_nov["cant_compasion"];
    }

    while ($respuesta_curso_ira_ago=mysqli_fetch_array($resultado_curso_ira_ago)) {
        $array_curso_ira_ago[$respuesta_curso_ira_ago["curso"]]=$respuesta_curso_ira_ago["cant_ira"];
    }
    while ($respuesta_curso_ira_sep=mysqli_fetch_array($resultado_curso_ira_sep)) {
        $array_curso_ira_sep[$respuesta_curso_ira_sep["curso"]]=$respuesta_curso_ira_sep["cant_ira"];
    }
    while ($respuesta_curso_ira_oct=mysqli_fetch_array($resultado_curso_ira_oct)) {
        $array_curso_ira_oct[$respuesta_curso_ira_oct["curso"]]=$respuesta_curso_ira_oct["cant_ira"];
    }
    while ($respuesta_curso_ira_nov=mysqli_fetch_array($resultado_curso_ira_nov)) {
        $array_curso_ira_nov[$respuesta_curso_ira_nov["curso"]]=$respuesta_curso_ira_nov["cant_ira"];
    }

    while ($respuesta_curso_autoestima_ago=mysqli_fetch_array($resultado_curso_autoestima_ago)) {
        $array_curso_autoestima_ago[$respuesta_curso_autoestima_ago["curso"]]=$respuesta_curso_autoestima_ago["cant_autoestima"];
    }
    while ($respuesta_curso_autoestima_sep=mysqli_fetch_array($resultado_curso_autoestima_sep)) {
        $array_curso_autoestima_sep[$respuesta_curso_autoestima_sep["curso"]]=$respuesta_curso_autoestima_sep["cant_autoestima"];
    }
    while ($respuesta_curso_autoestima_oct=mysqli_fetch_array($resultado_curso_autoestima_oct)) {
        $array_curso_autoestima_oct[$respuesta_curso_autoestima_oct["curso"]]=$respuesta_curso_autoestima_oct["cant_autoestima"];
    }
    while ($respuesta_curso_autoestima_nov=mysqli_fetch_array($resultado_curso_autoestima_nov)) {
        $array_curso_autoestima_nov[$respuesta_curso_autoestima_nov["curso"]]=$respuesta_curso_autoestima_nov["cant_autoestima"];
    }

    while ($respuesta_curso_culpa_ago=mysqli_fetch_array($resultado_curso_culpa_ago)) {
        $array_curso_culpa_ago[$respuesta_curso_culpa_ago["curso"]]=$respuesta_curso_culpa_ago["cant_culpa"];
    }
    while ($respuesta_curso_culpa_sep=mysqli_fetch_array($resultado_curso_culpa_sep)) {
        $array_curso_culpa_sep[$respuesta_curso_culpa_sep["curso"]]=$respuesta_curso_culpa_sep["cant_culpa"];
    }
    while ($respuesta_curso_culpa_oct=mysqli_fetch_array($resultado_curso_culpa_oct)) {
        $array_curso_culpa_oct[$respuesta_curso_culpa_oct["curso"]]=$respuesta_curso_culpa_oct["cant_culpa"];
    }
    while ($respuesta_curso_culpa_nov=mysqli_fetch_array($resultado_curso_culpa_nov)) {
        $array_curso_culpa_nov[$respuesta_curso_culpa_nov["curso"]]=$respuesta_curso_culpa_nov["cant_culpa"];
    }
    for ($i=3; $i < 9; $i++) { 
        if(isset($array_curso_alegria_ago[$i])!='TRUE'){
            $array_curso_alegria_ago[$i]=0;
        }
        if(isset($array_curso_tristeza_ago[$i])!='TRUE'){
            $array_curso_tristeza_ago[$i]=0;
        }
        if(isset($array_curso_confianza_ago[$i])!='TRUE'){
            $array_curso_confianza_ago[$i]=0;
        }
        if(isset($array_curso_miedo_ago[$i])!='TRUE'){
            $array_curso_miedo_ago[$i]=0;
        }
        if(isset($array_curso_compasion_ago[$i])!='TRUE'){
            $array_curso_compasion_ago[$i]=0;
        }
        if(isset($array_curso_ira_ago[$i])!='TRUE'){
            $array_curso_ira_ago[$i]=0;
        }
        if(isset($array_curso_autoestima_ago[$i])!='TRUE'){
            $array_curso_autoestima_ago[$i]=0;
        }
        if(isset($array_curso_culpa_ago[$i])!='TRUE'){
            $array_curso_culpa_ago[$i]=0;
        }
    }
    for ($i=3; $i < 9; $i++) { 
        if(isset($array_curso_alegria_sep[$i])!='TRUE'){
            $array_curso_alegria_sep[$i]=0;
        }
        if(isset($array_curso_tristeza_sep[$i])!='TRUE'){
            $array_curso_tristeza_sep[$i]=0;
        }
        if(isset($array_curso_confianza_sep[$i])!='TRUE'){
            $array_curso_confianza_sep[$i]=0;
        }
        if(isset($array_curso_miedo_sep[$i])!='TRUE'){
            $array_curso_miedo_sep[$i]=0;
        }
        if(isset($array_curso_compasion_sep[$i])!='TRUE'){
            $array_curso_compasion_sep[$i]=0;
        }
        if(isset($array_curso_ira_sep[$i])!='TRUE'){
            $array_curso_ira_sep[$i]=0;
        }
        if(isset($array_curso_autoestima_sep[$i])!='TRUE'){
            $array_curso_autoestima_sep[$i]=0;
        }
        if(isset($array_curso_culpa_sep[$i])!='TRUE'){
            $array_curso_culpa_sep[$i]=0;
        }
    }
    for ($i=3; $i < 9; $i++) { 
        if(isset($array_curso_alegria_oct[$i])!='TRUE'){
            $array_curso_alegria_oct[$i]=0;
        }
        if(isset($array_curso_tristeza_oct[$i])!='TRUE'){
            $array_curso_tristeza_oct[$i]=0;
        }
        if(isset($array_curso_confianza_oct[$i])!='TRUE'){
            $array_curso_confianza_oct[$i]=0;
        }
        if(isset($array_curso_miedo_oct[$i])!='TRUE'){
            $array_curso_miedo_oct[$i]=0;
        }
        if(isset($array_curso_compasion_oct[$i])!='TRUE'){
            $array_curso_compasion_oct[$i]=0;
        }
        if(isset($array_curso_ira_oct[$i])!='TRUE'){
            $array_curso_ira_oct[$i]=0;
        }
        if(isset($array_curso_autoestima_oct[$i])!='TRUE'){
            $array_curso_autoestima_oct[$i]=0;
        }
        if(isset($array_curso_culpa_oct[$i])!='TRUE'){
            $array_curso_culpa_oct[$i]=0;
        }
    }
    for ($i=3; $i < 9; $i++) { 
        if(isset($array_curso_alegria_nov[$i])!='TRUE'){
            $array_curso_alegria_nov[$i]=0;
        }
        if(isset($array_curso_tristeza_nov[$i])!='TRUE'){
            $array_curso_tristeza_nov[$i]=0;
        }
        if(isset($array_curso_confianza_nov[$i])!='TRUE'){
            $array_curso_confianza_nov[$i]=0;
        }
        if(isset($array_curso_miedo_nov[$i])!='TRUE'){
            $array_curso_miedo_nov[$i]=0;
        }
        if(isset($array_curso_compasion_nov[$i])!='TRUE'){
            $array_curso_compasion_nov[$i]=0;
        }
        if(isset($array_curso_ira_nov[$i])!='TRUE'){
            $array_curso_ira_nov[$i]=0;
        }
        if(isset($array_curso_autoestima_nov[$i])!='TRUE'){
            $array_curso_autoestima_nov[$i]=0;
        }
        if(isset($array_curso_culpa_nov[$i])!='TRUE'){
            $array_curso_culpa_nov[$i]=0;
        }
    }
    


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
    if($total_respuesta_miedo["total"]==0){
        $vacio_miedo="si";
        $keys_array_alumnos_miedo=0;
        $largo_key_miedo=0;
        $array_alumnos_miedo["nulo"]=0;
    }else{
        while ($respuesta_miedo=mysqli_fetch_array($resultado_miedo)) {
            $porcentaje=($respuesta_miedo["cantidad"]*100)/$total_respuesta_miedo["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_miedo[$respuesta_miedo["nombre"]]=$porcentaje;
            //$suma=$suma+$porcentaje;
            //$suma = bcdiv($suma,'1',2);
        }
        $vacio_miedo="no";
        $keys_array_alumnos_miedo=array_keys($array_alumnos_miedo); 
        $largo_key_miedo = sizeof($keys_array_alumnos_miedo);              
 
    }
    if($total_respuesta_confianza["total"]==0){
        $vacio_confianza="si";
        $keys_array_alumnos_confianza=0;
        $largo_key_confianza=0;
        $array_alumnos_confianza["nulo"]=0;
    }else{
       while ($respuesta_confianza=mysqli_fetch_array($resultado_confianza)) {
            $porcentaje=($respuesta_confianza["cantidad"]*100)/$total_respuesta_confianza["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_confianza[$respuesta_confianza["nombre"]]=$porcentaje;
        }
        $vacio_confianza="no";        
        $keys_array_alumnos_confianza=array_keys($array_alumnos_confianza); 
        $largo_key_confianza = sizeof($keys_array_alumnos_confianza);             
    }
    if($total_respuesta_ira["total"]==0){
        $vacio_ira="si";        
        $keys_array_alumnos_ira=0; 
        $largo_key_ira=0;
        $array_alumnos_ira["nulo"]=0;              
    }else{
       while ($respuesta_ira=mysqli_fetch_array($resultado_ira)) {
            $porcentaje=($respuesta_ira["cantidad"]*100)/$total_respuesta_ira["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_ira[$respuesta_ira["nombre"]]=$porcentaje;
        }
        $vacio_ira="no";        
        $keys_array_alumnos_ira=array_keys($array_alumnos_ira); 
        $largo_key_ira = sizeof($keys_array_alumnos_ira);             
    }
    if($total_respuesta_compasion["total"]==0){
        $vacio_conpasion="si";
        $keys_array_alumnos_compasion=0; 
        $largo_key_compasion=0; 
        $array_alumnos_compasion["nulo"]=0;
    }else{
        while ($respuesta_compasion=mysqli_fetch_array($resultado_compasion)) {
            $porcentaje=($respuesta_compasion["cantidad"]*100)/$total_respuesta_compasion["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_compasion[$respuesta_compasion["nombre"]]=$porcentaje;
        }
        $vacio_compasion="no";
        $keys_array_alumnos_compasion=array_keys($array_alumnos_compasion); 
        $largo_key_compasion = sizeof($keys_array_alumnos_compasion);              
    
    }
    if($total_respuesta_tristeza["total"]==0){
        $vacio_tristeza="si";
        $keys_array_alumnos_tristeza=0; 
        $largo_key_tristeza=0;
        $array_alumnos_tristeza["nulo"]=0;
    }else{
        while ($respuesta_tristeza=mysqli_fetch_array($resultado_tristeza)) {
            $porcentaje=($respuesta_tristeza["cantidad"]*100)/$total_respuesta_tristeza["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_tristeza[$respuesta_tristeza["nombre"]]=$porcentaje;
        }
        $vacio_tristeza="no";
        $keys_array_alumnos_tristeza=array_keys($array_alumnos_tristeza); 
        $largo_key_tristeza = sizeof($keys_array_alumnos_tristeza);              
    
    }
    if($total_respuesta_culpa["total"]==0){
        $vacio_culpa="si";
        $keys_array_alumnos_culpa=0; 
        $largo_key_culpa=0;
        $array_alumnos_culpa["nulo"]=0;
    }else{
        while ($respuesta_culpa=mysqli_fetch_array($resultado_culpa)) {
            $porcentaje=($respuesta_culpa["cantidad"]*100)/$total_respuesta_culpa["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_culpa[$respuesta_culpa["nombre"]]=$porcentaje;
        }
        $vacio_culpa="no";
        $keys_array_alumnos_culpa=array_keys($array_alumnos_culpa); 
        $largo_key_culpa = sizeof($keys_array_alumnos_culpa);              
    
    }
    if($total_respuesta_autoestima["total"]==0){
        $vacio_autoestima="si";
        $keys_array_alumnos_autoestima=0; 
        $largo_key_autoestima=0;
        $array_alumnos_autoestima["nulo"]=0;
    }else{
        while ($respuesta_autoestima=mysqli_fetch_array($resultado_autoestima)) {
            $porcentaje=($respuesta_autoestima["cantidad"]*100)/$total_respuesta_autoestima["total"];
            $porcentaje = bcdiv($porcentaje, '1', 2);
            $array_alumnos_autoestima[$respuesta_autoestima["nombre"]]=$porcentaje;
        }
        $vacio_autoestima="no";
        $keys_array_alumnos_autoestima=array_keys($array_alumnos_autoestima); 
        $largo_key_autoestima = sizeof($keys_array_alumnos_autoestima);              
    
   }
   if($total_respuesta_alegria["total"]==0){
        $vacio_alegria="si";
        $keys_array_alumnos_alegria=0; 
        $largo_key_alegria=0;
        $array_alumnos_alegria["nulo"]=0;
    }else{
        while ($respuesta_alegria1=mysqli_fetch_array($resultado_alegria1)) {
            $porcentaje=($respuesta_alegria1["cantidad"]*100)/$total_respuesta_alegria["total"];
            $porcentaje = bcdiv($porcentaje, '1', 4);
            $array_alumnos_alegria[$respuesta_alegria1["nombre"]]=$porcentaje;
            $array_alumnos_alegria_cantidad[$respuesta_alegria1["nombre"]]=$respuesta_alegria1["cantidad"];
         //   $suma=$suma+$porcentaje;
           // $suma = bcdiv($suma,'1',4);
        }
        while ($respuesta_alegria2=mysqli_fetch_array($resultado_alegria2)) {
            $porcentaje=($respuesta_alegria2["cantidad"]*100)/$total_respuesta_alegria["total"];
            $porcentaje = bcdiv($porcentaje, '1', 4);
            $array_alumnos_alegria[$respuesta_alegria2["nombre"]]=$porcentaje;
            $array_alumnos_alegria_cantidad[$respuesta_alegria2["nombre"]]=$respuesta_alegria2["cantidad"];
            //$suma=$suma+$porcentaje;
            //$suma = bcdiv($suma,'1',4);
        }
        while ($respuesta_alegria3=mysqli_fetch_array($resultado_alegria3)) {
            $porcentaje=($respuesta_alegria3["cantidad"]*100)/$total_respuesta_alegria["total"];
            $porcentaje = bcdiv($porcentaje, '1', 4);
            $array_alumnos_alegria[$respuesta_alegria3["nombre"]]=$porcentaje;
            $array_alumnos_alegria_cantidad[$respuesta_alegria3["nombre"]]=$respuesta_alegria3["cantidad"];
            //$suma=$suma+$porcentaje;
            //$suma = bcdiv($suma,'1',4);
        }
        while ($respuesta_alegria4=mysqli_fetch_array($resultado_alegria4)) {
            $porcentaje=($respuesta_alegria4["cantidad"]*100)/$total_respuesta_alegria["total"];
            $porcentaje = bcdiv($porcentaje, '1', 4);
            $array_alumnos_alegria[$respuesta_alegria4["nombre"]]=$porcentaje;
            $array_alumnos_alegria_cantidad[$respuesta_alegria4["nombre"]]=$respuesta_alegria4["cantidad"];
            //$suma=$suma+$porcentaje;
            //$suma = bcdiv($suma,'1',4);
        }
        while ($respuesta_alegria5=mysqli_fetch_array($resultado_alegria5)) {
            $porcentaje=($respuesta_alegria5["cantidad"]*100)/$total_respuesta_alegria["total"];
            $porcentaje = bcdiv($porcentaje, '1', 4);
            $array_alumnos_alegria[$respuesta_alegria5["nombre"]]=$porcentaje;
            $array_alumnos_alegria_cantidad[$respuesta_alegria5["nombre"]]=$respuesta_alegria5["cantidad"];
            //$suma=$suma+$porcentaje;
            //$suma = bcdiv($suma,'1',4);
        }
        $vacio_alegria="no";
        $keys_array_alumnos_alegria=array_keys($array_alumnos_alegria); 
        $largo_key_alegria = sizeof($keys_array_alumnos_alegria);              
    
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
    
                 

$datos = array(
'estado'=>'ok',
'estado1'=>'ok', 
'array_alumnos_miedo'=>$array_alumnos_miedo,
'array_alumnos_confianza'=>$array_alumnos_confianza,
'array_alumnos_ira'=>$array_alumnos_ira,
'array_alumnos_compasion'=>$array_alumnos_compasion,
'array_alumnos_tristeza'=>$array_alumnos_tristeza,
'array_alumnos_alegria'=>$array_alumnos_alegria,
'array_alumnos_culpa'=>$array_alumnos_culpa,
'array_alumnos_autoestima'=>$array_alumnos_autoestima,
'array_alumnos_alegria_cantidad'=>$array_alumnos_alegria_cantidad,
'keys_array_alumnos_miedo'=>$keys_array_alumnos_miedo,
'keys_array_alumnos_confianza'=>$keys_array_alumnos_confianza,
'keys_array_alumnos_ira'=>$keys_array_alumnos_ira,
'keys_array_alumnos_compasion'=>$keys_array_alumnos_compasion,
'keys_array_alumnos_tristeza'=>$keys_array_alumnos_tristeza,
'keys_array_alumnos_alegria'=>$keys_array_alumnos_alegria,
'keys_array_alumnos_culpa'=>$keys_array_alumnos_culpa,
'keys_array_alumnos_autoestima'=>$keys_array_alumnos_autoestima,
'largo_key_miedo'=>$largo_key_miedo,
'largo_key_confianza'=>$largo_key_confianza,
'largo_key_ira'=>$largo_key_ira,
'largo_key_compasion'=>$largo_key_compasion,
'largo_key_tristeza'=>$largo_key_tristeza,
'largo_key_alegria'=>$largo_key_alegria,
'largo_key_culpa'=>$largo_key_culpa,
'largo_key_autoestima'=>$largo_key_autoestima,
'array_curso_alegria_ago' =>$array_curso_alegria_ago,
'array_curso_alegria_sep' =>$array_curso_alegria_sep,
'array_curso_alegria_oct' =>$array_curso_alegria_oct,
'array_curso_alegria_nov' =>$array_curso_alegria_nov,
'array_curso_tristeza_ago' =>$array_curso_tristeza_ago,
'array_curso_tristeza_sep' =>$array_curso_tristeza_sep,
'array_curso_tristeza_oct' =>$array_curso_tristeza_oct,
'array_curso_tristeza_nov' =>$array_curso_tristeza_nov,
'array_curso_confianza_ago' =>$array_curso_confianza_ago,
'array_curso_confianza_sep' =>$array_curso_confianza_sep,
'array_curso_confianza_oct' =>$array_curso_confianza_oct,
'array_curso_confianza_nov' =>$array_curso_confianza_nov,
'array_curso_miedo_ago' =>$array_curso_miedo_ago,
'array_curso_miedo_sep' =>$array_curso_miedo_sep,
'array_curso_miedo_oct' =>$array_curso_miedo_oct,
'array_curso_miedo_nov' =>$array_curso_miedo_nov,
'array_curso_compasion_ago' =>$array_curso_compasion_ago,
'array_curso_compasion_sep' =>$array_curso_compasion_sep,
'array_curso_compasion_oct' =>$array_curso_compasion_oct,
'array_curso_compasion_nov' =>$array_curso_compasion_nov,
'array_curso_ira_ago' =>$array_curso_ira_ago,
'array_curso_ira_sep' =>$array_curso_ira_sep,
'array_curso_ira_oct' =>$array_curso_ira_oct,
'array_curso_ira_nov' =>$array_curso_ira_nov,
'array_curso_autoestima_ago' =>$array_curso_autoestima_ago,
'array_curso_autoestima_sep' =>$array_curso_autoestima_sep,
'array_curso_autoestima_oct' =>$array_curso_autoestima_oct,
'array_curso_autoestima_nov' =>$array_curso_autoestima_nov,
'array_curso_culpa_ago' =>$array_curso_culpa_ago,
'array_curso_culpa_sep' =>$array_curso_culpa_sep,
'array_curso_culpa_oct' =>$array_curso_culpa_oct,
'array_curso_culpa_nov' =>$array_curso_culpa_nov,
);
//Devolvemos el array pasado a JSON como objeto
echo json_encode($datos, JSON_FORCE_OBJECT);
?>