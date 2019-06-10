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
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="/basedatos/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/basedatos/assets/css/now-ui-dashboard.css?v=1.2.0" rel="stylesheet" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/basedatos/assets/demo/demo.css" rel="stylesheet" />
  <?php
    $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
    $consulta= "select * from test1 where match('".$_POST['variable']."') group by pregunta1";
    $resultado= mysqli_query($con,$consulta) or die('error en realizar la consulta');
    
  ?>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a  class="simple-text logo-mini">
          kg
        </a>
        <a class="simple-text logo-normal">
          Karina Gonzalez
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="pregunta2.php">
              <i class="now-ui-icons design_app"></i>
              <p>Pregunta2</p>
            </a>
          </li>
          <li>
            <a href="./icons.html">
              <i class="now-ui-icons education_atom"></i>
              <p>Icons</p>
            </a>
          </li>
          <li>
            <a href="./map.html">
              <i class="now-ui-icons location_map-big"></i>
              <p>Maps</p>
            </a>
          </li>
          <li>
            <a href="./notifications.html">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Notifications</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg fixed-top navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
      
                          <form action="index.php" method="POST">
                              SphinxQL Query:
                              <div class="input-group no-border">
  <!-- realiza la consulta--> <textarea class="form-control" rows="3" name="variable"></textarea>
                              <input type="submit" name="enviar">
                         </form>
      </div>

          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          
                   <canvas id="lineChart" ></canvas>
          
      
        </div>
       <div class="row">
          <div class="col-md-6">
            <div class="card" style="width: 60rem;">
              <div class="card-header">
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table >
                      <tr>
                    <th><b>codigo</b></th>
                    <th><b>nombre</b></th>
                    <th><b>Fecha    </b></th>
                    <th><b>emociones durante la clase</b></th>
                    <th><b>objetivo de la clase con sus propia palabras</b></th>
                    <th><b>determinar o explicar al menos 2 ideas</b></th>
                    <th><b>que aprendi</b></th>
                    <th><b>dudas y sugerencias para proxima clase</b></th>
                  </tr>

      <?php 
    
      while($consulta = mysqli_fetch_array($resultado))
            {
              echo 
              "
              <tr>
                    <td>".$consulta['id']."</td>
                    <td>".$consulta['nombre']."</td>
                    <td>".$consulta['fecha']."</td>
                    <td>".$consulta['pregunta1']."</td>
                    <td>".$consulta['pregunta2']."</td>
                    <td>".$consulta['pregunta3']."</td>
                    <td>".$consulta['pregunta4']."</td>
                    <td>".$consulta['pregunta5']."</td>

                    </tr>
              ";
            }
          ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
  <!--   Core JS Files   -->
  <!--  Google Maps Plugin    -->

  <!-- Chart JS -->
  <!--  Notifications Plugin    -->
  <script src="/basedatos/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/basedatos/assets/js/now-ui-dashboard.min.js?v=1.2.0" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="/basedatos/assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>
   <script>
      let lineChart = document.getElementById('lineChart').getContext('2d');

      let massPopChart = new Chart(lineChart,{
          type:'pie',
          data:{
              labels:[
              <?php 
               $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
               $consulta1= "select pregunta1, count(*) as cantidad from test1 where match('".$_POST['variable']."') group by pregunta1";
               $resultado1= mysqli_query($con,$consulta1) or die('error en realizar la consulta');
              while($cons = mysqli_fetch_array($resultado1))
              {
              ?>
              '<?php echo $cons["pregunta1"] ?>',
              <?php
            }
            ?>
            ],
              datasets:[{
                  data:[<?php 
               $consulta2= "select pregunta1, count(*) as cantidad from test1 where match('".$_POST['variable']."') group by pregunta1";
               $resultado2= mysqli_query($con,$consulta2) or die('error en realizar la consulta');
              while($cons2 = mysqli_fetch_array($resultado2))
              {
              ?>
              <?php echo $cons2["cantidad"] ?>,
              <?php
            }
            ?>],
                            backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 23, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 9, 32, 0.6)',
            'rgba(15, 200, 20, 0.6)',
            'rgba(100, 20, 112, 0.6)',
            'rgba(10, 20, 112, 0.6)',
            'rgba(100, 20, 12, 0.6)',
            'rgba(10, 20, 11, 0.6)',
            'rgba(200, 20, 112, 0.6)',
            'rgba(180, 20, 12, 0.6)',
            'rgba(10, 1, 12, 0.6)',
            'rgba(25, 20, 255, 0.6)',
            'rgba(180, 20, 12, 0.6)',
            'rgba(80, 210, 12, 0.6)',
          ]
              }
              ]
          },
          options:{}
      });
      
      </script>
</html>
