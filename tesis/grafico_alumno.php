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

      <h2>Seleccionar curso y alumno para analizar</h2>

         
          <div class="col-md-3"></div>

          <div class="col-md-4" >

          
          <select class="form-control" id="filtrado" onchange="seleccionar_alumnos_curso()">
              <option value="">Seleccione curso para Filtrar</option>
              <?php while($consulta = mysqli_fetch_array($resultado))
                      {?>
                  <option value="<?=$consulta['curso']?>"><?=$consulta['curso']?>° básico</option>
              <?php } ?>
          </select>
          <div class="panel-body" id="seleccionar_alumnos_curso" ></div>
          <select class="form-control" id="alumnos" name=alumnos onchange="borrar_informacion_anterior()"> 
            <option value="">Seleccione alumno para Filtrar
          </select>
          <div class="col-md-2">
            <br>
          </div>

          </div>
          
          <div class="col-md-2">
            <br>
            <div class="form-group">
              <button type="submit" onclick="modificar($('#alumnos').val(),$('#filtrado').val())" class="btn btn-success btn-sm" >Buscar <span class="fa fa-search"></span>
              </button>
              <div id="resultado"></div>

            </div>
          </div>
  </div>


  <div  class="panel-body" style="background-color:white">

    <div  class="col-md-12" >
  
<div id="panel_positivo_1"></div>

<div id="panel_positivo_2"></div>

<div id="panel_positivo_3"></div>

    
    <div class="col-md-12"></div>
    
    <!--Negativas-->
    <div id="panel_negativo_1"></div>
  

    <div id="panel_negativo_2">

    </div>
    <div id="panel_negativo_3" >
  
    </div>

</div>
</div>



  <div  class="panel-body" style="background-color:white">


    <div  class="col-md-6" id="contenedor_div_1" >

 
    </div>
     <div  class="col-md-6" id="contenedor_div_2">
   
    </div>

    <!--barra-->
    <div  class="col-md-6" id="contenedor_div_3">
    
    </div>

     <div  class="col-md-6" id="contenedor_div_4">
     
    </div>
            


  </div>

       <script type="text/javascript" src="graficos.js"></script>
</body>
