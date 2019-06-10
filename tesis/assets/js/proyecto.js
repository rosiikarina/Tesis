
      let lineChart = document.getElementById('lineChart').getContext('2d');

      let massPopChart = new Chart(lineChart,{
          type:'pie',
          data:{
              labels:[
              <?php 
              if($_POST['variable']){


                
$consulta1= "select pregunta1, count(*) as cantidad from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."') group by pregunta1";
    



    }
    else{
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
              <?php 
                if($_POST['variable']){
      $consulta2= "select pregunta1, count(*) as cantidad from test1 where match('@pregunta1 ".$_POST['variable']." @curso ".$_POST['curso']."') group by pregunta1";
    }
    else{
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