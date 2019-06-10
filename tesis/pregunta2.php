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
    if($_POST['variable']){
      $consulta= "select * from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."')";
    }
    else{
      $consulta = "select * from test1";  
    }
    $resultado= mysqli_query($con,$consulta) or die('error en realizar la consulta');   
  ?>
</head>

<body class="">
    <?php include("sidebar.php"); ?>
    <div class="main-panel">
    <?php include("nav.php"); ?>
      
    <div class="panel-header panel-header-sm">
    </div>
      <div class="content">
        <div class="row">
          <!-- grafico-->
          <div class="col-md-6">
            <div class="card">
              <canvas id="lineChart" ></canvas>
            </div>
          </div>
          <div class="col-md-6">
              <div class="card" >
                 <canvas id="barChart"></canvas>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card" >
                 <canvas id="myChart"></canvas>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card" >
                 <canvas id="posChart"></canvas>
              </div>
            </div>

            <!-- -->
          <!-- tabla                       -->  
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2>Alumnos</h2>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Emociones</th>
                      </tr>
                    </thead>

                    <?php 
                      while($consulta = mysqli_fetch_array($resultado))
                      {
                        echo 
                        "
                        <tbody>
                          <tr>
                            <td>".$consulta['nombre']."</td>
                            <td>".$consulta['fecha']."</td>
                            <td>".$consulta['pregunta1']."</td>
                            
                          </tr>
                        </tbody>
                        ";
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>

          </div>
        <!-- fin de la tabla-->
        </div>
      </div>
      </div>
  <!--   Core JS Files   -->

   <script>
      let lineChart = document.getElementById('lineChart').getContext('2d');

      let massPopChart = new Chart(lineChart,{
          type:'pie',
          data:{
              labels:[
<?php if($_POST['variable']){   
          $consulta1= "select pregunta1, count(*) as cantidad from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."') group by pregunta1";
      }else{
          $consulta1 = "select pregunta1, count(*) as cantidad from test1 where match('') group by pregunta1";  
      }
      $con = mysqli_connect('localhost',null,null,null,9306) or die('error de conexion');
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
            data:[
<?php if($_POST['variable']){
        $consulta2= "select pregunta1, count(*) as cantidad from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."') group by pregunta1";
      }else{
        $consulta2 = "select pregunta1, count(*) as cantidad from test1 where match('') group by pregunta1";  
      }
      $resultado2= mysqli_query($con,$consulta2) or die('error en realizar la consulta');
        while($cons2 = mysqli_fetch_array($resultado2))
        {
?>
<?php echo $cons2["cantidad"] ?>,
              <?php
                 }
              ?>
            ],
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
          options:{title: {
            display: true,
            text: 'Emociones',fontSize:24
        }}
      });
      
      </script>



<script>
      let barChart = document.getElementById('barChart').getContext('2d');

      let massPopChartt = new Chart(barChart,{
          type:'doughnut',
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
          },options:{title: {
            display: true,
            text: 'Emociones',fontSize:24}
        }
      });
            
      </script>
      <script>
    var ctx = document.getElementById("myChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["miedo","tristeza","ira","culpa"],
            datasets: [{ 

                data: [1, 4, 0,2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            title: {
            display: true,
            text: 'Cantidad emociones negativa',fontSize:24}
        }
    });
    </script>
     <script>
    var ctx = document.getElementById("posChart");
    var posChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["confianza","alegria","amor","autoestima"],
            datasets: [{                
                data: [3, 10, 0,2],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            },
            title: {
            display: true,
            text: 'Cantidad emociones positiva',fontSize:24}
        }
    });
    </script>
  
</body>

</html>
