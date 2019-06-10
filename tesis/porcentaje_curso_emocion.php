<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
      Analisis de Sentimientos
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

  <!-- CSS Files -->
  <link href="/tesis/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/tesis/assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/tesis/assets/demo/demo.css" rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!--<?php    
    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    if($_POST['variable']){
      $consulta= "select * from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."')";
    }
    else{
      $consulta = "select * from test1";  
    }
    $resultado= mysqli_query($con,$consulta) or die('error en realizar la consulta');   
  ?>-->
   <?php    
    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    
      $consulta = "select count(*),curso from test1 group by curso";  
    
    $resultado= mysqli_query($con,$consulta) or die('error en realizar la consulta');   
  ?>
</head>
<body class="">




    <?php include("sidebar.php"); ?>
    <div class="main-panel">
    <?php include("nav.php"); ?>
    <div class="panel-header panel-header-sm">

    </div>
     <!-- realiza la consulta-->
    <div  class="panel-body" style="background-color:white">
     
    <div class="card" style="text-align: center;">

      <h2>Seleccionar curso para analizar</h2>
      <div class="col-md-1"></div>
      <div class="col-md-10">
         <div class="panel panel-info">
          <div class="panel-heading">¡Información!</div>
          <div class="panel-body">Seleccionar un curso, para el análisis de porcentaje de cada alumno con respecto a sus compañeros, en cada categoría de emoción.</div>
        </div></div>

          <div class="col-md-3"></div>

          <div class="col-md-4" >

          

          <select class="form-control" id="filtrado">
              <option value="">Seleccione curso para Filtrar</option>
              <option value="Todos">Todos</option>
              <?php while($consulta = mysqli_fetch_array($resultado))
                      {?>
                  <option value="<?=$consulta['curso']?>"><?=$consulta['curso']?>° básico</option>
              <?php } ?>
          </select>
          
          

          </div>
          
          <div class="col-md-2">
            
            <div class="form-group">
              <button type="submit" onclick="porcentaje_persona_por_emocion($('#filtrado').val())" class="btn btn-success btn-sm" >Buscar <span class="fa fa-search"></span>
              </button>
              <div id="resultado"></div>

            </div>
          </div>
  </div>


  <div  class="panel-body" style="background-color:white">

</div>



  <div  class="panel-body" style="background-color:white">


     <div id="div_confianza"></div>
     <div id="div_miedo"></div>
     <div id="div_compasion"></div>
     <div id="div_ira"></div>
     <div id="div_alegria"></div>
     <div id="div_alegria7"></div>
     <div id="div_alegria0"></div>
     <div id="div_alegria1"></div><div id="div_alegria2"></div><div id="div_alegria3"></div><div id="div_alegria4"></div><div id="div_alegria5"></div><div id="div_autoestima"></div><div id="div_tristeza5"></div><div id="div_tristeza"></div><div id="div_alegria6"></div>
     
     
     <div id="div_culpa"></div>



  </div>

       <script type="text/javascript" src="graficos.js"></script>
</body>
