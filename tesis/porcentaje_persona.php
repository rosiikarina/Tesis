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
  <link href="/tesiss/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/tesiss/assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/tesiss/assets/demo/demo.css" rel="stylesheet" />

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <?php    
    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    
      $consulta = "select count(*),curso from test1 group by curso";  
    
    $resultado= mysqli_query($con,$consulta) or die('error en realizar la consulta');   
  ?>
</head>
<body class="" onload="porcentaje_por_persona()">




    <?php include("sidebar.php"); ?>
    <div class="main-panel">
    <?php include("nav.php"); ?>
    <div class="panel-header panel-header-sm">

    </div>
     <!-- realiza la consulta-->
    <div  class="panel-body" style="background-color:white">
     
    <div class="card" style="text-align: center;">

      <h2>Porcentaje por alumno respecto del todo en encuestas</h2>

  <div  class="panel-body" style="background-color:white">
<div class="col-md-1"></div>

    <div  class="col-md-10" id="contenedor_div_general" >

      
    </div>           


  </div>

  
  </div>


  <div  class="panel-body" style="background-color:white">

   
    </div>

</div>
</div>


 
       <script type="text/javascript" src="pie.js"></script>
</body>
