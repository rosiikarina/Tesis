function seleccionar_alumnos_curso(){
    
    var url = "seleccionar_alumnos.php";
    var curso=$("#filtrado").val();
                $('#alumnos').html('');
            $('#panel_negativo_1').html('');
            $('#panel_negativo_2').html('');
            $('#panel_negativo_3').html('');
            $('#panel_positivo_1').html('');
            $('#panel_positivo_2').html('');
            $('#panel_positivo_3').html('');

            $('#contenedor_div_1').html('');
            $('#contenedor_div_2').html('');
            $('#contenedor_div_3').html('');
            $('#contenedor_div_4').html('');
            

    var parametros ={
            "curso" : curso
    };

    $.ajax({
        url: url,
        type: "POST",
        data: parametros
    }).done(function(respuesta){
        if (respuesta.estado === "ok") {

            var alumnos = new Array();
            for (var i = 0; i < respuesta.largo_arreglo; i++) {
                alumnos.push(respuesta.resultado1[i]);
            }
            
            var num_alumnos = alumnos.length;
            $('#alumnos').append($('<option>', {value:"", text:"Seleccione un alumno para filtrar"}));

            for(i=0;i<num_alumnos;i++){ 
                $('#alumnos').append($('<option>', {value:alumnos[i], text:alumnos[i]}));
            }
        }
    });
}

function generateColor(ranges) {
            if (!ranges) {
                ranges = [
                    [120,256],
                    [0, 190],
                    [0, 30]
                ];
            }
            var g = function() {
                //select random range and remove
                var range = ranges.splice(Math.floor(Math.random()*ranges.length), 1)[0];
                //pick a random number from within the range
                return Math.floor(Math.random() * (range[1] - range[0])) + range[0];
            }
            return "rgba(" + g() + "," + g() + "," + g() +","+0.8+")";
        };

function porcentaje_por_persona(){
     var url = "alumnos.php";
    var curso="1";
            
    var parametros ={
           "curso" : curso
    };
   
    //console.log(curso);

    $.ajax({
        url: url,
        type: "POST",
        data: parametros
    }).done(function(respuesta){
        if (respuesta.estado === "ok") {

            var labels_general = [];//nombres
            var data_general = [];//porcentaje
            var colores = [];
            for (var i = 0; i < respuesta.largo_key; i++) {
                labels_general.push(respuesta.keys_array_alumnos[i]+"(%)");
                data_general.push(respuesta.array_alumnos[respuesta.keys_array_alumnos[i]]);
                colores.push(generateColor());
            }
           
            var i=0;

            $("#contenedor_div_general").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de emociones por persona<button type='submit' id='boton_grafico1' class='btn btn-info btn-sm' data-toggle='collapse' data-target='#demo'>Cambiar tipo</button></div><div class='panel-body' id='contenedor_grafico_general'><canvas id='ChartGeneral'></canvas></div></div>");
            $("#ChartGeneral").remove();
            $("#contenedor_grafico_general").html("<canvas id='ChartGeneral'></canvas>");
                
                
                //$('#boton_grafico1').click(function(){
                    $("#ChartGeneral").remove();
                    $("#contenedor_grafico_general").html("<canvas id='ChartGeneral'></canvas>");
                    i=i+1;
                    if (i==1){                    
                        var ctx = $("#ChartGeneral"); 
                        var ChartGeneral = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                //labels: [respuesta.variable, "Blue", "Yellow", "Green", "Purple", "Orange"],
                                labels: labels_general,
                                datasets: [{
                                    label: 'Alumno con su % con respecto a todos',
                                    data: data_general,
                                     backgroundColor: colores,
                                    borderColor: colores,
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                
        }
    });
}
function porcentaje_persona_por_emocion(variable){
     var url = "alumnos_emocion.php";
    //var curso="1";
    console.log(variable);
    var parametros ={
           "variable" : variable
    };
   
    //console.log(curso);

    $.ajax({
        url: url,
        type: "POST",
        data: parametros
    }).done(function(respuesta){
        if (respuesta.estado === "ok") {
            var labels_confianza = [];//nombres
            var labels_miedo = [];//nombres
            var labels_compasion = [];//nombres
            var labels_ira = [];//nombres
            var labels_alegria = [];//nombres
            var labels_tristeza = [];//nombres
            var labels_autoestima = [];//nombres
            var labels_culpa = [];//nombres
            var labels_alegria_cantidad = [];//nombres cantidad
            
            var data_confianza = [];//porcentaje
            var data_miedo = [];//porcentaje
            var data_compasion = [];//porcentaje
            var data_ira = [];//porcentaje
            var data_alegria = [];//porcentaje
            var data_tristeza = [];//porcentaje
            var data_autoestima = [];//porcentaje
            var data_culpa = [];//porcentaje
            var data_alegria_cantidad = [];//unidad
            
            var colores_confianza = [];
            var colores_miedo = [];
            var colores_compasion = [];
            var colores_ira = [];
            var colores_alegria = [];
            var colores_tristeza = [];
            var colores_autoestima = [];
            var colores_culpa = [];

            var confianza = 0;
            var miedo = 0;
            var compasion = 0;
            var ira = 0;
            var alegria = 0;
            var tristeza = 0;
            var autoestima = 0;
            var culpa = 0;

            var curso_alegria_ago = [];
            var curso_alegria_sep = [];
            var curso_alegria_oct = [];
            var curso_alegria_nov = [];
            var curso_tristeza_ago = [];
            var curso_tristeza_sep = [];
            var curso_tristeza_oct = [];
            var curso_tristeza_nov = [];
            var curso_confianza_ago = [];
            var curso_confianza_sep = [];
            var curso_confianza_oct = [];
            var curso_confianza_nov = [];
            var curso_miedo_ago = [];
            var curso_miedo_sep = [];
            var curso_miedo_oct = [];
            var curso_miedo_nov = [];
            var curso_compasion_ago = [];
            var curso_compasion_sep = [];
            var curso_compasion_oct = [];
            var curso_compasion_nov = [];
            var curso_ira_ago = [];
            var curso_ira_sep = [];
            var curso_ira_oct = [];
            var curso_ira_nov = [];
            var curso_autoestima_ago = [];
            var curso_autoestima_sep = [];
            var curso_autoestima_oct = [];
            var curso_autoestima_nov = [];
            var curso_culpa_ago = [];
            var curso_culpa_sep = [];
            var curso_culpa_oct = [];
            var curso_culpa_nov = [];


            for (var k = 3; k < 9; k++) {
                curso_alegria_ago.push(respuesta.array_curso_alegria_ago[k]);
                curso_alegria_sep.push(respuesta.array_curso_alegria_sep[k]);
                curso_alegria_oct.push(respuesta.array_curso_alegria_oct[k]);
                curso_alegria_nov.push(respuesta.array_curso_alegria_nov[k]);
                curso_tristeza_ago.push(respuesta.array_curso_tristeza_ago[k]);
                curso_tristeza_sep.push(respuesta.array_curso_tristeza_sep[k]);
                curso_tristeza_oct.push(respuesta.array_curso_tristeza_oct[k]);
                curso_tristeza_nov.push(respuesta.array_curso_tristeza_nov[k]);
                curso_confianza_ago.push(respuesta.array_curso_confianza_ago[k]);
                curso_confianza_sep.push(respuesta.array_curso_confianza_sep[k]);
                curso_confianza_oct.push(respuesta.array_curso_confianza_oct[k]);
                curso_confianza_nov.push(respuesta.array_curso_confianza_nov[k]);
                curso_miedo_ago.push(respuesta.array_curso_miedo_ago[k]);
                curso_miedo_sep.push(respuesta.array_curso_miedo_sep[k]);
                curso_miedo_oct.push(respuesta.array_curso_miedo_oct[k]);
                curso_miedo_nov.push(respuesta.array_curso_miedo_nov[k]);
                curso_compasion_ago.push(respuesta.array_curso_compasion_ago[k]);
                curso_compasion_sep.push(respuesta.array_curso_compasion_sep[k]);
                curso_compasion_oct.push(respuesta.array_curso_compasion_oct[k]);
                curso_compasion_nov.push(respuesta.array_curso_compasion_nov[k]);
                curso_ira_ago.push(respuesta.array_curso_ira_ago[k]);
                curso_ira_sep.push(respuesta.array_curso_ira_sep[k]);
                curso_ira_oct.push(respuesta.array_curso_ira_oct[k]);
                curso_ira_nov.push(respuesta.array_curso_ira_nov[k]);
                curso_autoestima_ago.push(respuesta.array_curso_autoestima_ago[k]);
                curso_autoestima_sep.push(respuesta.array_curso_autoestima_sep[k]);
                curso_autoestima_oct.push(respuesta.array_curso_autoestima_oct[k]);
                curso_autoestima_nov.push(respuesta.array_curso_autoestima_nov[k]);
                curso_culpa_ago.push(respuesta.array_curso_culpa_ago[k]);
                curso_culpa_sep.push(respuesta.array_curso_culpa_sep[k]);
                curso_culpa_oct.push(respuesta.array_curso_culpa_oct[k]);
                curso_culpa_nov.push(respuesta.array_curso_culpa_nov[k]);
            }

            if (respuesta.largo_key_confianza!=0){
                for (var i = 0; i < respuesta.largo_key_confianza; i++) {
                    labels_confianza.push(respuesta.keys_array_alumnos_confianza[i]+"(%)");
                    data_confianza.push(respuesta.array_alumnos_confianza[respuesta.keys_array_alumnos_confianza[i]]);
                    colores_confianza.push(generateColor());
                }
                confianza=1;
            }
            if (respuesta.largo_key_miedo!=0){
                for (var i = 0; i < respuesta.largo_key_miedo; i++) {
                    labels_miedo.push(respuesta.keys_array_alumnos_miedo[i]+"(%)");
                    data_miedo.push(respuesta.array_alumnos_miedo[respuesta.keys_array_alumnos_miedo[i]]);
                    colores_miedo.push(generateColor());
                }
                miedo=1;
            }
            if (respuesta.largo_key_compasion!=0){
                for (var i = 0; i < respuesta.largo_key_compasion; i++) {
                    labels_compasion.push(respuesta.keys_array_alumnos_compasion[i]+"(%)");
                    data_compasion.push(respuesta.array_alumnos_compasion[respuesta.keys_array_alumnos_compasion[i]]);
                    colores_compasion.push(generateColor());
                }
                compasion=1;
            }
            if (respuesta.largo_key_ira!=0){
                for (var i = 0; i < respuesta.largo_key_ira; i++) {
                    labels_ira.push(respuesta.keys_array_alumnos_ira[i]+"(%)");
                    data_ira.push(respuesta.array_alumnos_ira[respuesta.keys_array_alumnos_ira[i]]);
                    colores_ira.push(generateColor());
                }
                ira=1;
            }
            if (respuesta.largo_key_alegria!=0){
                for (var i = 0; i < respuesta.largo_key_alegria; i++) {
                    labels_alegria.push(respuesta.keys_array_alumnos_alegria[i]+"(%)");
                    labels_alegria_cantidad.push(respuesta.keys_array_alumnos_alegria[i]);
                    data_alegria.push(respuesta.array_alumnos_alegria[respuesta.keys_array_alumnos_alegria[i]]);
                    data_alegria_cantidad.push(respuesta.array_alumnos_alegria_cantidad[respuesta.keys_array_alumnos_alegria[i]]);
                    colores_alegria.push(generateColor());
                }
                alegria=1;
            }
            if (respuesta.largo_key_tristeza!=0){
                for (var i = 0; i < respuesta.largo_key_tristeza; i++) {
                    labels_tristeza.push(respuesta.keys_array_alumnos_tristeza[i]+"(%)");
                    data_tristeza.push(respuesta.array_alumnos_tristeza[respuesta.keys_array_alumnos_tristeza[i]]);
                    colores_tristeza.push(generateColor());
                }
                tristeza=1;
            }
            if (respuesta.largo_key_autoestima!=0){
                for (var i = 0; i < respuesta.largo_key_autoestima; i++) {
                    labels_autoestima.push(respuesta.keys_array_alumnos_autoestima[i]+"(%)");
                    data_autoestima.push(respuesta.array_alumnos_autoestima[respuesta.keys_array_alumnos_autoestima[i]]);
                    colores_autoestima.push(generateColor());
                }
                autoestima=1;
            }
            if (respuesta.largo_key_culpa!=0){
                for (var i = 0; i < respuesta.largo_key_culpa; i++) {
                    labels_culpa.push(respuesta.keys_array_alumnos_culpa[i]+"(%)");
                    data_culpa.push(respuesta.array_alumnos_culpa[respuesta.keys_array_alumnos_culpa[i]]);
                    colores_culpa.push(generateColor());
                }
                culpa=1;
            }
            $('#div_confianza').html('');
            $('#div_miedo').html('');
            $('#div_compasion').html('');
            $('#div_ira').html('');
            $('#div_alegria').html('');
            $('#div_alegria0').html('');
            $('#div_alegria1').html('');
            $('#div_alegria2').html('');
            $('#div_alegria3').html('');
            $('#div_alegria4').html('');
            $('#div_alegria5').html('');
            $('#div_alegria6').html('');
            $('#div_alegria7').html('');
            $('#div_tristeza').html('');
            $('#div_tristeza5').html('');
            $('#div_autoestima').html('');
            $('#div_culpa').html('');
            if((confianza+miedo+compasion+ira+alegria+tristeza+autoestima+culpa)>4){
              
                if(confianza==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_confianza").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    //$("#contenedor_grafico1").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
            
                }else{
                    $("#div_confianza").html("<div  class='col-md-4' id='contenedor_div_confianza' ></div>");
                                        
                    $("#contenedor_div_confianza").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Confianza y Esperanza</div><div class='panel-body' id='contenedor_grafico_confianza'><canvas id='ChartConfianza'></canvas></div></div>");

                    //dibujar grafico
                    $("#ChartConfianza").remove();
                    $("#contenedor_grafico_confianza").html("<canvas id='ChartConfianza'></canvas>");
                                       
                    var ctx = $("#ChartConfianza"); 
                    var ChartConfianza = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_confianza,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_confianza,
                                 backgroundColor: colores_confianza,
                                borderColor: colores_confianza,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(miedo==0){
                   //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_miedo").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_miedo").html("<div  class='col-md-4' id='contenedor_div_miedo' ></div>");
                     $("#contenedor_div_miedo").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Miedo y Preocupación</div><div class='panel-body' id='contenedor_grafico_miedo'><canvas id='ChartMiedo'></canvas></div></div>");
                    
                    //dibujar grafico
                    $("#ChartMiedo").remove();
                    $("#contenedor_grafico_miedo").html("<canvas id='ChartMiedo'></canvas>");
                                       
                    var ctx = $("#ChartMiedo"); 
                    var ChartMiedo = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_miedo,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_miedo,
                                 backgroundColor: colores_miedo,
                                borderColor: colores_miedo,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(compasion==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_compasion").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_compasion").html("<div  class='col-md-4' id='contenedor_div_compasion' ></div>");
                    
                    $("#contenedor_div_compasion").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Compasión, Amor y Gratitud</div><div class='panel-body' id='contenedor_grafico_compasion'><canvas id='ChartCompasion'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartCompasion").remove();
                    $("#contenedor_grafico_compasion").html("<canvas id='ChartCompasion'></canvas>");
                                       
                    var ctx = $("#ChartCompasion"); 
                    var ChartCompasion = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_compasion,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_compasion,
                                 backgroundColor: colores_compasion,
                                borderColor: colores_compasion,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(ira==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_ira").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_ira").html("<div  class='col-md-4' id='contenedor_div_ira' ></div>");
                    
                    $("#contenedor_div_ira").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Ira, Odio y Envidia<br></div><div class='panel-body' id='contenedor_grafico_ira'><canvas id='ChartIra'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartIra").remove();
                    $("#contenedor_grafico_ira").html("<canvas id='ChartIra'></canvas>");
                                       
                    var ctx = $("#ChartIra"); 
                    var ChartIra = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_ira,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_ira,
                                 backgroundColor: colores_ira,
                                borderColor: colores_ira,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(alegria==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_alegria").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    if(variable=="Todos"){
                        //$("#div_alegria0").html("<div class='col-md-5'></div>");
                        $("#div_alegria").html("<div  class='col-md-12' id='contenedor_div_alegria' ></div>");
                        $("#div_alegria5").html("<div  class='col-md-8' id='contenedor_div_alegria5' ></div>");
                        $("#div_tristeza5").html("<div  class='col-md-6' id='contenedor_div_tristeza5' ></div>");
                        $("#div_alegria6").html("<div  class='col-md-12' id='contenedor_div_alegria6' ></div>");
                        $("#div_alegria7").html("<div  class='col-md-12' id='contenedor_div_alegria7' ></div>");
                    }else{
                        $("#div_alegria").html("<div  class='col-md-6' id='contenedor_div_alegria' ></div>");
                    }
                    $("#contenedor_div_alegria").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Alegría y Entusiasmo respecto al todo</div><div class='panel-body' id='contenedor_grafico_alegria'><canvas id='ChartAlegria'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria").remove();
                    $("#contenedor_grafico_alegria").html("<canvas id='ChartAlegria'></canvas>");

                    $("#contenedor_div_alegria5").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Emociones Alegría y Entusiasmo por curso y mes</div><div class='panel-body' id='contenedor_grafico_alegria5'><canvas id='ChartAlegria5'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria5").remove();
                    $("#contenedor_grafico_alegria5").html("<canvas id='ChartAlegria5'></canvas>");


                    $("#contenedor_div_tristeza5").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Emociones Tristeza y Resignación por curso y mes</div><div class='panel-body' id='contenedor_grafico_tristeza5'><canvas id='ChartTristeza5'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartTristeza5").remove();
                    $("#contenedor_grafico_tristeza5").html("<canvas id='ChartTristeza5'></canvas>");

                    $("#contenedor_div_alegria6").html(" <div  class='panel panel-info'><div class='panel-heading' style='text-align: center;'>Cantidad de tipo de emociones por curso y mes</div><div class='panel-body' id='contenedor_grafico_alegria6'><canvas id='ChartAlegria6'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria6").remove();
                    $("#contenedor_grafico_alegria6").html("<canvas id='ChartAlegria6'></canvas>");

                    $("#contenedor_div_alegria7").html(" <div  class='panel panel-info'><div class='panel-heading' style='text-align: center;'>Cantidad de emociones Alegría y Entusiasmo por alumno</div><div class='panel-body' id='contenedor_grafico_alegria7'><canvas id='ChartAlegria7'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria7").remove();
                    $("#contenedor_grafico_alegria7").html("<canvas id='ChartAlegria7'></canvas>");
                                       
                    var ctx = $("#ChartAlegria"); 
                    var ChartAlegria = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels_alegria,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_alegria,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    var ctx = $("#ChartAlegria7"); 
                    var ChartAlegria7 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_alegria_cantidad,
                            datasets: [{
                                label: 'Alumno con su cantidad de emociones Alegría y entusiasmo',
                                data: data_alegria_cantidad,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    var ctx = $("#ChartAlegria5"); 
                    var ChartAlegria5 = new Chart(ctx, {
                          type: 'line',
                          data: {
                            labels: ['Ago', 'Sep', 'Oct', 'Nov'],
                            datasets: [{
                              label: 'Curso 3',
                              //yAxisID: 'IdA',
                              data: [curso_alegria_ago[0], curso_alegria_sep[0], curso_alegria_oct[0], curso_alegria_nov[0]],
                              backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)'
                                    ]
                            }, {
                              label: 'Curso 4',
                              //yAxisID: 'B',
                              data: [curso_alegria_ago[1], curso_alegria_sep[1],curso_alegria_oct[1], curso_alegria_nov[1]],
                              backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 5',
                              //yAxisID: 'C',
                              data: [curso_alegria_ago[2], curso_alegria_sep[2], curso_alegria_oct[2], curso_alegria_nov[2]],
                              backgroundColor: [
                                        'rgba(255, 206, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 206, 86, 1)'
                                    ]
                            },{
                              label: 'Curso 6',
                              //yAxisID: 'D',
                              data: [curso_alegria_ago[3],curso_alegria_sep[3], curso_alegria_oct[3], curso_alegria_nov[3]],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 7',
                              //yAxisID: 'D',
                              data: [curso_alegria_ago[4],curso_alegria_sep[4], curso_alegria_oct[4],curso_alegria_nov[4]],
                                    borderColor: [
                                        'rgba(21, 213, 8, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 8',
                              //yAxisID: 'E',
                              data: [curso_alegria_ago[5], curso_alegria_sep[5], curso_alegria_oct[5],curso_alegria_nov[5]],
                              backgroundColor: [
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(153, 102, 255, 1)'
                                    ]
                            }]
                          }
                    });
                    var ctx = $("#ChartTristeza5"); 
                    var ChartTristeza5 = new Chart(ctx, {
                          type: 'line',
                          data: {
                            labels: ['Ago', 'Sep', 'Oct', 'Nov'],
                            datasets: [{
                              label: 'Curso 3',
                              //yAxisID: 'IdA',
                              data: [curso_tristeza_ago[0], curso_tristeza_sep[0], curso_tristeza_oct[0], curso_tristeza_nov[0]],
                              backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)'
                                    ]
                            }, {
                              label: 'Curso 4',
                              //yAxisID: 'B',
                              data: [curso_tristeza_ago[1], curso_tristeza_sep[1],curso_tristeza_oct[1], curso_tristeza_nov[1]],
                              backgroundColor: [
                                        'rgba(54, 162, 235, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(54, 162, 235, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 5',
                              //yAxisID: 'C',
                              data: [curso_tristeza_ago[2], curso_tristeza_sep[2], curso_tristeza_oct[2], curso_tristeza_nov[2]],
                              backgroundColor: [
                                        'rgba(255, 206, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 206, 86, 1)'
                                    ]
                            },{
                              label: 'Curso 6',
                              //yAxisID: 'D',
                              data: [curso_tristeza_ago[3],curso_tristeza_sep[3], curso_tristeza_oct[3], curso_tristeza_nov[3]],
                                    borderColor: [
                                        'rgba(75, 192, 192, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 7',
                              //yAxisID: 'D',
                              data: [curso_tristeza_ago[4],curso_tristeza_sep[4], curso_tristeza_oct[4],curso_tristeza_nov[4]],
                                    borderColor: [
                                        'rgba(21, 213, 8, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 8',
                              //yAxisID: 'E',
                              data: [curso_tristeza_ago[5], curso_tristeza_sep[5], curso_tristeza_oct[5],curso_tristeza_nov[5]],
                              backgroundColor: [
                                        'rgba(255, 159, 64, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(153, 102, 255, 1)'
                                    ]
                            }]
                          }
                    });
                    var ctx = $("#ChartAlegria6"); 
                    var ChartAlegria6 = new Chart(ctx, {
                        type: 'bar',
                          data: {
                            labels: ['Ago', 'Sep', 'Oct', 'Nov'],
                            datasets: [{
                              label: 'Curso 3: Alegria',
                              stack: '3',
                              data: [curso_alegria_ago[0],curso_alegria_sep[0],curso_alegria_oct[0],curso_alegria_nov[0]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 3: Tristeza',
                              stack: '3',
                              data: [curso_tristeza_ago[0],curso_tristeza_sep[0],curso_tristeza_oct[0],curso_tristeza_nov[0]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },{
                              label: 'Curso 3: Miedo',
                              stack: '3',
                              data: [curso_miedo_ago[0],curso_miedo_sep[0],curso_miedo_oct[0],curso_miedo_nov[0]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 3: Ira',
                              stack: '3',
                              data: [curso_ira_ago[0],curso_ira_sep[0],curso_ira_oct[0],curso_ira_nov[0]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 3: Culpa',
                              stack: '3',
                              data: [curso_culpa_ago[0],curso_culpa_sep[0],curso_culpa_oct[0],curso_culpa_nov[0]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 3: Confianza',
                              stack: '3',
                              data: [curso_confianza_ago[0],curso_confianza_sep[0],curso_confianza_oct[0],curso_confianza_nov[0]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 3: Compasion',
                              stack: '3',
                              data: [curso_compasion_ago[0],curso_compasion_sep[0],curso_compasion_oct[0],curso_compasion_nov[0]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            
                            {
                              label: 'Curso 3: Autoestima',
                              stack: '3',
                              data: [curso_autoestima_ago[0],curso_autoestima_sep[0],curso_autoestima_oct[0],curso_autoestima_nov[0]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            },

                            {
                              label: 'Curso 4: Alegria',
                              stack: '4',
                              data: [curso_alegria_ago[1], curso_alegria_sep[1], curso_alegria_oct[1],curso_alegria_nov[1]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 4: Tristeza',
                              stack: '4',
                              data: [curso_tristeza_ago[1], curso_tristeza_sep[1], curso_tristeza_oct[1],curso_tristeza_nov[1]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 4: Miedo',
                              stack: '4',
                              data: [curso_miedo_ago[1], curso_miedo_sep[1], curso_miedo_oct[1],curso_miedo_nov[1]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 4: Ira',
                              stack: '4',
                              data: [curso_ira_ago[1], curso_ira_sep[1], curso_ira_oct[1],curso_ira_nov[1]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 4: Culpa',
                              stack: '4',
                              data: [curso_culpa_ago[1], curso_culpa_sep[1], curso_culpa_oct[1],curso_culpa_nov[1]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 4: Confianza',
                              stack: '4',
                              data: [curso_confianza_ago[1], curso_confianza_sep[1], curso_confianza_oct[1],curso_confianza_nov[1]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 4: Compasion',
                              stack: '4',
                              data: [curso_compasion_ago[1], curso_compasion_sep[1], curso_compasion_oct[1],curso_compasion_nov[1]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 4: Autoestima',
                              stack: '4',
                              data: [curso_autoestima_ago[1], curso_autoestima_sep[1], curso_autoestima_oct[1],curso_autoestima_nov[1]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            },{
                              label: 'Curso 5: Alegria',
                              stack: '5',
                              data: [curso_alegria_ago[2], curso_alegria_sep[2],curso_alegria_oct[2],curso_alegria_nov[2]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 5: Tristeza',
                              stack: '5',
                              data: [curso_tristeza_ago[2], curso_tristeza_sep[2],curso_tristeza_oct[2],curso_tristeza_nov[2]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 5: Miedo',
                              stack: '5',
                              data: [curso_miedo_ago[2], curso_miedo_sep[2],curso_miedo_oct[2],curso_miedo_nov[2]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 5: Ira',
                              stack: '5',
                              data: [curso_ira_ago[2], curso_ira_sep[2],curso_ira_oct[2],curso_ira_nov[2]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 5: Culpa',
                              stack: '5',
                              data: [curso_culpa_ago[2], curso_culpa_sep[2],curso_culpa_oct[2],curso_culpa_nov[2]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 5: Confianza',
                              stack: '5',
                              data: [curso_confianza_ago[2], curso_confianza_sep[2],curso_confianza_oct[2],curso_confianza_nov[2]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 5: Compasion',
                              stack: '5',
                              data: [curso_compasion_ago[2], curso_compasion_sep[2],curso_compasion_oct[2],curso_compasion_nov[2]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            
                            {
                              label: 'Curso 5: Autoestima',
                              stack: '5',
                              data: [curso_autoestima_ago[2], curso_autoestima_sep[2],curso_autoestima_oct[2],curso_autoestima_nov[2]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            },{
                              label: 'Curso 6: Alegria',
                              stack: '6',
                              data: [curso_alegria_ago[3], curso_alegria_sep[3], curso_alegria_oct[3], curso_alegria_nov[3]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 6: Tristeza',
                              stack: '6',
                              data: [curso_tristeza_ago[3], curso_tristeza_sep[3], curso_tristeza_oct[3], curso_tristeza_nov[3]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 6: Miedo',
                              stack: '6',
                              data: [curso_miedo_ago[3], curso_miedo_sep[3], curso_miedo_oct[3], curso_miedo_nov[3]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 6: Ira',
                              stack: '6',
                              data: [curso_ira_ago[3], curso_ira_sep[3], curso_ira_oct[3], curso_ira_nov[3]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 6: Culpa',
                              stack: '6',
                              data: [curso_culpa_ago[3], curso_culpa_sep[3], curso_culpa_oct[3], curso_culpa_nov[3]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 6: Confianza',
                              stack: '6',
                              data: [curso_confianza_ago[3], curso_confianza_sep[3], curso_confianza_oct[3], curso_confianza_nov[3]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 6: Compasion',
                              stack: '6',
                              data: [curso_compasion_ago[3], curso_compasion_sep[3], curso_compasion_oct[3], curso_compasion_nov[3]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            
                            {
                              label: 'Curso 6: Autoestima',
                              stack: '6',
                              data: [curso_autoestima_ago[3], curso_autoestima_sep[3], curso_autoestima_oct[3], curso_autoestima_nov[3]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            },{
                              label: 'Curso 7: Alegria',
                              stack: '7',
                              data: [curso_alegria_ago[4], curso_alegria_sep[4], curso_alegria_oct[4],curso_alegria_nov[4]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 7: Tristeza',
                              stack: '7',
                              data: [curso_tristeza_ago[4], curso_tristeza_sep[4], curso_tristeza_oct[4],curso_tristeza_nov[4]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 7: Miedo',
                              stack: '7',
                              data: [curso_miedo_ago[4], curso_miedo_sep[4], curso_miedo_oct[4],curso_miedo_nov[4]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 7: Ira',
                              stack: '7',
                              data: [curso_ira_ago[4], curso_ira_sep[4], curso_ira_oct[4],curso_ira_nov[4]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 7: Culpa',
                              stack: '7',
                              data: [curso_culpa_ago[4], curso_culpa_sep[4], curso_culpa_oct[4],curso_culpa_nov[4]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 7: Confianza',
                              stack: '7',
                              data: [curso_confianza_ago[4], curso_confianza_sep[4], curso_confianza_oct[4],curso_confianza_nov[4]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 7: Compasion',
                              stack: '7',
                              data: [curso_compasion_ago[4], curso_compasion_sep[4], curso_compasion_oct[4],curso_compasion_nov[4]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            
                            {
                              label: 'Curso 7: Autoestima',
                              stack: '7',
                              data: [curso_autoestima_ago[4], curso_autoestima_sep[4], curso_autoestima_oct[4],curso_autoestima_nov[4]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            },{
                              label: 'Curso 8: Alegria',
                              stack: '8',
                              data: [curso_alegria_ago[5],curso_alegria_sep[5], curso_alegria_oct[5], curso_alegria_nov[5]],
                              backgroundColor: [
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)',
                                        'rgba(244, 144, 16, 1)'
                                    ]
                            },{label: 'Curso 8: Tristeza',
                              stack: '8',
                              data: [curso_tristeza_ago[5],curso_tristeza_sep[5], curso_tristeza_oct[5], curso_tristeza_nov[5]],
                              backgroundColor: [
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)',
                                        'rgba(13, 34, 245, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 8: Miedo',
                              stack: '8',
                              data: [curso_miedo_ago[5],curso_miedo_sep[5], curso_miedo_oct[5], curso_miedo_nov[5]],
                              backgroundColor: [
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)',
                                        'rgba(18, 29, 160, 1)'          ]
                            }, {
                              label: 'Curso 8: Ira',
                              stack: '8',
                              data: [curso_ira_ago[5],curso_ira_sep[5], curso_ira_oct[5], curso_ira_nov[5]],
                              backgroundColor: [
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)',
                                        'rgba(139, 94, 203, 1)'
                                    ]
                            },
                            {
                              label: 'Curso 8: Culpa',
                              stack: '8',
                              data: [curso_culpa_ago[5],curso_culpa_sep[5], curso_culpa_oct[5], curso_culpa_nov[5]],
                              backgroundColor: [
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)',
                                        'rgba(51, 206, 237, 1)'
                                        ]
                            },{
                              label: 'Curso 8: Confianza',
                              stack: '8',
                              data: [curso_confianza_ago[5],curso_confianza_sep[5], curso_confianza_oct[5], curso_confianza_nov[5]],
                              backgroundColor: [
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)',
                                        'rgba(68, 238, 54, 1)'
                                        ]
                            },
                            {
                              label: 'Curso 8: Compasion',
                              stack: '8',
                              data: [curso_compasion_ago[5],curso_compasion_sep[5], curso_compasion_oct[5], curso_compasion_nov[5]],
                              backgroundColor: [
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)',
                                        'rgba(14, 164, 2, 1)'
                                    ]
                            },
                            
                            {
                              label: 'Curso 8: Autoestima',
                              stack: '8',
                              data: [0,curso_autoestima_sep[5], curso_autoestima_oct[5], curso_autoestima_nov[5]],
                              backgroundColor: [
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)',
                                        'rgba(244, 16, 223, 1)'
                                    ]
                            }

                          ]
                          },
                          options: {
                            legend:{display: false}
                          }
                    });
                }//fin if de alegria
                if(tristeza==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_tristeza").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_tristeza").html("<div  class='col-md-6' id='contenedor_div_tristeza' ></div>");
                    
                    $("#contenedor_div_tristeza").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Tristeza y Resignación</div><div class='panel-body' id='contenedor_grafico_tristeza'><canvas id='ChartTristeza'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartTristeza").remove();
                    $("#contenedor_grafico_tristeza").html("<canvas id='ChartTristeza'></canvas>");
                                       
                    var ctx = $("#ChartTristeza"); 
                    var ChartTristeza = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_tristeza,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_tristeza,
                                 backgroundColor: colores_tristeza,
                                borderColor: colores_tristeza,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(autoestima==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_autoestima").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_autoestima").html("<div  class='col-md-4' id='contenedor_div_autoestima' ></div>");
                    
                    $("#contenedor_div_autoestima").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Autoestima y Orgullo</div><div class='panel-body' id='contenedor_grafico_autoestima'><canvas id='ChartAutoestima'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAutoestima").remove();
                    $("#contenedor_grafico_autoestima").html("<canvas id='ChartAutoestima'></canvas>");
                                       
                    var ctx = $("#ChartAutoestima"); 
                    var ChartAutoestima = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_autoestima,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_autoestima,
                                 backgroundColor: colores_autoestima,
                                borderColor: colores_autoestima,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(culpa==0){
                    //notificacion de informacion de que está vacío                
                    $("#contenedor_grafico_culpa").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                    
                }else{
                    $("#div_culpa").html("<div  class='col-md-4' id='contenedor_div_culpa' ></div>");
                   
                    $("#contenedor_div_culpa").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Culpa y Vergüenza<br><button type='submit' id='boton_grafico1' class='btn btn-info btn-sm' data-toggle='collapse' data-target='#demo'>Cambiar tipo</button></div><div class='panel-body' id='contenedor_grafico_culpa'><canvas id='ChartCulpa'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartCulpa").remove();
                    $("#contenedor_grafico_culpa").html("<canvas id='ChartCulpa'></canvas>");
                                       
                    var ctx = $("#ChartCulpa"); 
                    var ChartCulpa = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_culpa,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_culpa,
                                 backgroundColor: colores_culpa,
                                borderColor: colores_culpa,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
            
            }else{
                //solo se dibujan los gráficos con datos, los que son 0, no aparecen
                console.log("solo se dibujan los que tienen datos mayor a 0");
                if(confianza>0){
                    $("#div_confianza").html("<div  class='col-md-6' id='contenedor_div_confianza' ></div>");
                    $("#contenedor_div_confianza").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Confianza y Esperanza</div><div class='panel-body' id='contenedor_grafico_confianza'><canvas id='ChartConfianza'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartConfianza").remove();
                    $("#contenedor_grafico_confianza").html("<canvas id='ChartConfianza'></canvas>");
                                       
                    var ctx = $("#ChartConfianza"); 
                    var ChartConfianza = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_confianza,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_confianza,
                                 backgroundColor: colores_confianza,
                                borderColor: colores_confianza,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(miedo>0){
                    $("#div_miedo").html("<div  class='col-md-6' id='contenedor_div_miedo' ></div>");
                    $("#contenedor_div_miedo").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Miedo y Preocupación</div><div class='panel-body' id='contenedor_grafico_miedo'><canvas id='ChartMiedo'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartMiedo").remove();
                    $("#contenedor_grafico_miedo").html("<canvas id='ChartMiedo'></canvas>");
                                       
                    var ctx = $("#ChartMiedo"); 
                    var ChartMiedo = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_miedo,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_miedo,
                                 backgroundColor: colores_miedo,
                                borderColor: colores_miedo,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(compasion>0){
                    $("#div_compasion").html("<div  class='col-md-6' id='contenedor_div_compasion' ></div>");
                    $("#contenedor_div_compasion").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Compasión, Amor y Gratitud</div><div class='panel-body' id='contenedor_grafico_compasion'><canvas id='ChartCompasion'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartCompasion").remove();
                    $("#contenedor_grafico_compasion").html("<canvas id='ChartCompasion'></canvas>");
                                       
                    var ctx = $("#ChartCompasion"); 
                    var ChartCompasion = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_compasion,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_compasion,
                                 backgroundColor: colores_compasion,
                                borderColor: colores_compasion,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    
                }
                if(ira>0){
                    $("#div_ira").html("<div  class='col-md-6' id='contenedor_div_ira' ></div>");
                    $("#contenedor_div_ira").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Ira, Odio y Envidia<br></div><div class='panel-body' id='contenedor_grafico_ira'><canvas id='ChartIra'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartIra").remove();
                    $("#contenedor_grafico_ira").html("<canvas id='ChartIra'></canvas>");
                                       
                    var ctx = $("#ChartIra"); 
                    var ChartIra = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_ira,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_ira,
                                 backgroundColor: colores_ira,
                                borderColor: colores_ira,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    
                }
                if(alegria>0){
                    $("#div_alegria1").html("<div  class='col-md-6' id='contenedor_div_alegria1' ></div>");
                    $("#contenedor_div_alegria1").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Cantidad de alumno en emociones Alegría y Entusiasmo</div><div class='panel-body' id='contenedor_grafico_alegria1'><canvas id='ChartAlegria1'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria1").remove();
                    $("#contenedor_grafico_alegria1").html("<canvas id='ChartAlegria1'></canvas>");
                    
                    $("#div_alegria2").html("<div  class='col-md-6' id='contenedor_div_alegria2' ></div>");
                    $("#contenedor_div_alegria2").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Alegría y Entusiasmo</div><div class='panel-body' id='contenedor_grafico_alegria2'><canvas id='ChartAlegria2'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria2").remove();
                    $("#contenedor_grafico_alegria2").html("<canvas id='ChartAlegria2'></canvas>");
                    
                    $("#div_alegria3").html("<div  class='col-md-6' id='contenedor_div_alegria3' ></div>");
                    $("#contenedor_div_alegria3").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Alegría y Entusiasmo</div><div class='panel-body' id='contenedor_grafico_alegria3'><canvas id='ChartAlegria3'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria3").remove();
                    $("#contenedor_grafico_alegria3").html("<canvas id='ChartAlegria3'></canvas>");
                    
                    $("#div_alegria4").html("<div  class='col-md-6' id='contenedor_div_alegria4' ></div>");
                    $("#contenedor_div_alegria4").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Alegría y Entusiasmo</div><div class='panel-body' id='contenedor_grafico_alegria4'><canvas id='ChartAlegria4'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAlegria4").remove();
                    $("#contenedor_grafico_alegria4").html("<canvas id='ChartAlegria4'></canvas>");

                    var ctx = $("#ChartAlegria1"); 
                    var ChartAlegria1 = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_alegria_cantidad,
                            datasets: [{
                                label: 'Cantidad de respuestas emoción Alegría y Entusiasmo por alumno',
                                data: data_alegria_cantidad,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    var ctx = $("#ChartAlegria2"); 
                    var ChartAlegria2 = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels_alegria,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_alegria,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                    var ctx = $("#ChartAlegria3"); 
                    var ChartAlegria3 = new Chart(ctx, {
                        type: 'radar',
                        data: {
                            labels: labels_alegria,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_alegria,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        }
                    });
                    var ctx = $("#ChartAlegria4"); 
                    var ChartAlegria4 = new Chart(ctx, {
                        type: 'polarArea',
                        data: {
                            labels: labels_alegria,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_alegria,
                                 backgroundColor: colores_alegria,
                                borderColor: colores_alegria,
                                borderWidth: 1
                            }]
                        }, options:{
                            legend: {
                                position: 'right'
                            }
                        }
                    });
                    
                }
                if(tristeza>0){
                    $("#div_tristeza").html("<div  class='col-md-6' id='contenedor_div_tristeza' ></div>");
                    $("#contenedor_div_tristeza").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Tristeza y Resignación</div><div class='panel-body' id='contenedor_grafico_tristeza'><canvas id='ChartTristeza'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartTristeza").remove();
                    $("#contenedor_grafico_tristeza").html("<canvas id='ChartTristeza'></canvas>");
                                       
                    var ctx = $("#ChartTristeza"); 
                    var ChartTristeza = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_tristeza,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_tristeza,
                                 backgroundColor: colores_tristeza,
                                borderColor: colores_tristeza,
                                borderWidth: 1
                            }]
                        },options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(autoestima>0){
                    $("#div_autoestima").html("<div  class='col-md-6' id='contenedor_div_autoestima' ></div>");
                    $("#contenedor_div_autoestima").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Autoestima y Orgullo</div><div class='panel-body' id='contenedor_grafico_autoestima'><canvas id='ChartAutoestima'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartAutoestima").remove();
                    $("#contenedor_grafico_autoestima").html("<canvas id='ChartAutoestima'></canvas>");
                                       
                    var ctx = $("#ChartAutoestima"); 
                    var ChartAutoestima = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_autoestima,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_autoestima,
                                 backgroundColor: colores_autoestima,
                                borderColor: colores_autoestima,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }
                if(culpa>0){
                    $("#div_culpa").html("<div  class='col-md-6' id='contenedor_div_culpa' ></div>");
                    $("#contenedor_div_culpa").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Porcentaje de alumno en emociones Culpa y Vergüenza<br></div><div class='panel-body' id='contenedor_grafico_culpa'><canvas id='ChartCulpa'></canvas></div></div>");
                    //dibujar grafico
                    $("#ChartCulpa").remove();
                    $("#contenedor_grafico_culpa").html("<canvas id='ChartCulpa'></canvas>");
                                       
                    var ctx = $("#ChartCulpa"); 
                    var ChartCulpa = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels_culpa,
                            datasets: [{
                                label: 'Alumno con su % con respecto a todos',
                                data: data_culpa,
                                 backgroundColor: colores_culpa,
                                borderColor: colores_culpa,
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                              yAxes: [{
                                ticks: {
                                  beginAtZero: true
                                }
                              }],
                              xAxes: [{
                                ticks: {
                                  autoSkip: false
                                }
                              }]
                            }
                          }
                    });
                }

            }   
                
        }
    });
}


function borrar_informacion_anterior(){
    $('#panel_negativo_1').html('');
    $('#panel_negativo_2').html('');
    $('#panel_negativo_3').html('');
    $('#panel_positivo_1').html('');
    $('#panel_positivo_2').html('');
    $('#panel_positivo_3').html('');
    $('#contenedor_div_1').html('');
    $('#contenedor_div_2').html('');
    $('#contenedor_div_3').html('');
    $('#contenedor_div_4').html('');

}

function modificar(variable,variable2){
    var url = "consultas.php";
    var parametros ={
            "variable" : variable,
            "variable2": variable2
    };
    console.log("v1: ",variable);
    console.log("v2: ",variable2);
    $.ajax({
        url: url,
        type: "POST",
        data: parametros
    }).done(function(respuesta){
        if (respuesta.estado === "ok") {
            
            var variable = respuesta.variable            
            $(".respuesta").html("Servidor:<br><pre>"+JSON.stringify(respuesta.variable)+"</pre>");
            

            //array de emociones negativas y array de emociones positivas
            //el primer valor es el mayor

            console.log(respuesta.array_emociones_neg);
            console.log(respuesta.keys_emociones_neg[1]);
            console.log(respuesta.array_emociones_pos);
            console.log(respuesta.keys_emociones_pos[1]);
           
            var emocion="";
            var significado="";
            var desarrollo_emocional="";
            var tamano_panel=0;
           
            $('#panel_negativo_1').html('');
            $('#panel_negativo_2').html('');
            $('#panel_negativo_3').html('');
            $('#panel_positivo_1').html('');
            $('#panel_positivo_2').html('');
            $('#panel_positivo_3').html('');


            if(respuesta.estado1=="ok"){//negativo
                var tamano_panel=0;
                for(var j = 0; j < 3; j++){
                    if(respuesta.array_emociones_neg[respuesta.keys_emociones_neg[j]]!=null){
                        tamano_panel=tamano_panel+1;
                    }
                }
                if(tamano_panel==1){
                    tamano_panel=12;
                }
                if(tamano_panel==2){
                    tamano_panel=6;
                }
                if(tamano_panel==3){
                    tamano_panel=4;
                }
                for (var i = 0; i < 3; i++) {
                    emocion=respuesta.keys_emociones_neg[i];
                    if((respuesta.array_emociones_neg[emocion])!=null){
                        //dimension Alarma, emocion negativa
                        if(emocion=="miedo"){
                            emocion="Miedo";
                            significado="Impulsa a la huida o protección ante algún peligro presente (real o imaginario).  Cortisol: Lleva glucosa a los músculos para emprender la huida  ";
                            desarrollo_emocional="Confianza";
                            significado_desarrollo_emocional="Seguridad en el presente, en la situación o las personas. Sensación de alivio cuando la amenaza no se cumple. Serotonina";
                            dimension="Alarma: Relacionada con la protección frente a las amenazas a las que se enfrenta la persona. ";
                        }
                        if(emocion=="preocupacion"){
                            emocion="Preocupación";
                            significado="Lleva a estar en atención vigilante a supuestos peligros potenciales. Incertidumbre respecto al futuro, ansiedad, inquietud. ";
                            desarrollo_emocional="Esperanza";
                            significado_desarrollo_emocional="Expectativa positiva respecto al futuro";
                            dimension="Alarma: Relacionada con la protección frente a las amenazas a las que se enfrenta la persona. ";
                        }    
                        //dimension Animo, emocion negativa        
                        if(emocion=="tristeza"){
                            emocion="Tristeza";
                            significado="Sentimiento de pérdida o desengaño. Fomenta la reflexión y despierta la empatía de los demás. ";
                            desarrollo_emocional="Alegría";
                            significado_desarrollo_emocional="Acontecimientos positivos, aproximación a una meta deseada. Facilita la creatividad. Dopamina: hormona del placer";
                            dimension="Ánimo: Relacionada con el grado de dolor o placer que obtiene la persona de los acontecimientos de su entorno físico y social.";
                        }
                        if(emocion=="resignación"){
                            emocion="resignación";
                            significado="Indefensión, sensación de que no puede hacerse nada para resolver una situación negativa";
                            desarrollo_emocional="Entusiasmo";
                            significado_desarrollo_emocional="Interés, pasión y entrega a una actividad. Fomenta la consecución de objetivos. ";
                            dimension="Ánimo: Relacionada con el grado de dolor o placer que obtiene la persona de los acontecimientos de su entorno físico y social.";
                        }
                        //dimension Afecto, emocion negativa
                        if(emocion=="ira"){
                            emocion="Ira";
                            significado="Sentirse ofendido por alguien. Frustración de una expectativa. Noradrenalina: prepara al organismo para el ataque. ";
                            desarrollo_emocional="Compasión";
                            significado_desarrollo_emocional="Sentirse afectado por el sufrimiento de otro y desear ayudar. ";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás. ";
                        }
                        if(emocion=="odio"){
                            emocion="Odio";
                            significado="Rechazo y animadversión hacia otra persona.";
                            desarrollo_emocional="Amor";
                            significado_desarrollo_emocional="Atracción, entrega y afecto por otra persona. Favorece la convivencia.Oxitocina y vasopresina: promueve la vinculación afectiva, el apego y la protección paternal ";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás. ";
                        }
                        if(emocion=="envidia"){
                            emocion="Envidia";
                            significado="Comparación con otro al que se juzga afortunado ";
                            desarrollo_emocional="Gratitud";
                            significado_desarrollo_emocional="Comparación con otros más desafortunados";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás. ";
                        }
                        //dimension Autoconcepto, emocion negativa
                        if(emocion=="culpa"){
                            emocion="Culpa";
                            significado="Sentimiento de haber transgredido una norma moral.";
                            desarrollo_emocional="Autoestima";
                            significado_desarrollo_emocional="Estima que uno siente hacia sí mismo, aceptarse y quererse. ";
                            dimension="Autoconcepto: Relacionada con la satisfacción que siente la persona consigo misma.";
                        }
                        if(emocion=="verguenza"){
                            emocion="Vergüenza";
                            significado="Sensación de haber transgredido una norma social o haber fracasado ante los demás. ";
                            desarrollo_emocional="Orgullo";
                            significado_desarrollo_emocional="Atribución personal de un logro. ";
                            dimension="Autoconcepto: Relacionada con la satisfacción que siente la persona consigo misma.";
                        }
                        //imprimir la informacion de la emocion negativa
                        var div_emocion="<div class='panel panel-warning col-md-"+tamano_panel+"'>";
                        if(i==0){
                            $("#panel_negativo_1").html(""+div_emocion+"<div class='panel-heading'>Emoción negativa más frecuente: "+emocion+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado+"</h5><p class='card-text' style='color:#ffac7f;'>Su dimension es "+dimension+"</p></div></div><div class='panel-heading'>Desarrollo emocional: "+desarrollo_emocional+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado_desarrollo_emocional+"</h5></div></div></div>");
                        }
                        if(i==1){
                            $("#panel_negativo_2").html(""+div_emocion+"<div class='panel-heading'>Emoción negativa más frecuente: "+emocion+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado+"</h5><p class='card-text' style='color:#ffac7f;'>Su dimension es"+dimension+"</p></div></div><div class='panel-heading'>Desarrollo emocional: "+desarrollo_emocional+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado_desarrollo_emocional+"</h5></div></div>");
                        }
                        if(i==2){
                            $("#panel_negativo_3").html(""+div_emocion+"<div class='panel-heading'>Emoción negativa más frecuente: "+emocion+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado+"</h5><p class='card-text' style='color:#ffac7f;'>Su dimension es"+dimension+"</p></div></div><div class='panel-heading'>Desarrollo emocional: "+desarrollo_emocional+"</div><div class='panel-body'><div class='card-body text-warning'><h5 class='card-title'>Significado: "+significado_desarrollo_emocional+"</h5></div></div>");
                        }
                        console.log("tamano:"+tamano_panel);
                    }

                }

            }
            if(respuesta.estado2=="ok"){//positiva
                var tamano_panel=0;
                for(var j = 0; j < 3; j++){
                    if(respuesta.array_emociones_pos[respuesta.keys_emociones_pos[j]]!=null){
                        tamano_panel=tamano_panel+1;
                    }
                }
                if(tamano_panel==1){
                    tamano_panel=12;
                }
                if(tamano_panel==2){
                    tamano_panel=6;
                }
                if(tamano_panel==3){
                    tamano_panel=4;
                }
                for (var i = 0; i < 3; i++) {
                    emocion=respuesta.keys_emociones_pos[i];
                    if((respuesta.array_emociones_pos[emocion])!=null){
                        //dimension alarma, emocion positiva
                        if (emocion=="confianza") {
                            emocion="Confianza";
                            significado="Seguridad en el presente, en la situación o las personas. Sensación de alivio cuando la amenaza no se cumple. Serotonina ";
                            dimension="Alarma: Relacionada con la protección frente a las amenazas a las que se enfrenta la persona. ";
                        }
                        if (emocion=="esperanza") {
                            emocion="Esperanza";
                            significado="Expectativa positiva respecto al futuro ";
                            dimension="Alarma: Relacionada con la protección frente a las amenazas a las que se enfrenta la persona. ";
                        }
                        //dimension animo, emocion positiva
                        if (emocion=="alegria") {
                            emocion="Alegría";
                            significado="Acontecimientos positivos, aproximación a una meta deseada. Facilita la creatividad. Dopamina: hormona del placer ";
                            dimension="Ánimo:Relacionada con el grado de dolor o placer que obtiene la persona de los acontecimientos de su entorno físico y social. ";
                        }
                        if (emocion=="entusiasmo") {
                            emocion="Entusiasmo";
                            significado="Interés, pasión y entrega a una actividad. Fomenta la consecución de objetivos. ";
                            dimension="Ánimo:Relacionada con el grado de dolor o placer que obtiene la persona de los acontecimientos de su entorno físico y social. ";
                        }
                        //dimension afecto, emocion positiva
                        if (emocion=="compasión") {
                            emocion="Compasión";
                            significado="Sentirse afectado por el sufrimiento de otro y desear ayudar.";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás.";
                        }
                        if (emocion=="amor") {
                            emocion="Amor";
                            significado="Atracción, entrega y afecto por otra persona. Favorece la convivencia.Oxitocina y vasopresina: promueve la vinculación afectiva, el apego y la protección paternal ";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás.";
                        }
                        if (emocion=="gratitud") {
                            emocion="Gratitud";
                            significado="Comparación con otros más desafortunados ";
                            dimension="Afecto: Relacionada con las preferencias en las relaciones y el valor que se confiere a los demás.";
                        }
                        //dimension autoconcepto, emocion positiva
                        if (emocion=="autoestima") {
                            emocion="Autoestima";
                            significado="Estima que uno siente hacia sí mismo, aceptarse y quererse. ";
                            dimension="Autoconcepto: Relacionada con la satisfacción que siente la persona consigo misma";
                        }
                        if (emocion=="orgullo") {
                            emocion="Orgullo";
                            significado="Atribución personal de un logro.";
                            dimension="Autoconcepto: Relacionada con la satisfacción que siente la persona consigo misma";
                        }
                        //imprimir la informacion de la emocion positiva
                        var div_emocion="<div class='panel panel-info col-md-"+tamano_panel+"'>";
                        if(i==0){
                            $("#panel_positivo_1").html(""+div_emocion+"<div class='panel-heading'>Emoción positiva más frecuente:"+emocion+"</div><div class='panel-body' ><div class='card-body text-warning'><h5 class='card-title' style='color:#58D68D;''>Significado: "+significado+"</h5><p class='card-text' style='color:#85929E;'>Su dimensión es "+dimension+"</p></div></div></div>"); 
                        }
                        if(i==1){
                            $("#panel_positivo_2").html(""+div_emocion+"<div class='panel-heading'>Emoción positiva más frecuente:"+emocion+"</div><div class='panel-body' ><div class='card-body text-warning'><h5 class='card-title' style='color:#58D68D;''>Significado: "+significado+"</h5><p class='card-text' style='color:#85929E;'>Su dimensión es "+dimension+"</p></div></div></div>"); 
                        }
                        if(i==2){
                            $("#panel_positivo_3").html(""+div_emocion+"<div class='panel-heading'>Emoción positiva más frecuente:"+emocion+"</div><div class='panel-body' ><div class='card-body text-warning'><h5 class='card-title' style='color:#58D68D;''>Significado: "+significado+"</h5><p class='card-text' style='color:#85929E;'>Su dimensión es "+dimension+"</p></div></div></div>"); 
                        }

                    }
                }

            }
            
            //contenedores div mostrar
            $("#contenedor_div_1").html(" <div  class='panel panel-danger'><div class='panel-heading' style='text-align: center;'>Cantidad de emociones negativas<button type='submit' id='boton_grafico1' class='btn btn-info btn-sm' data-toggle='collapse' data-target='#demo'>Cambiar tipo</button></div><div class='panel-body' id='contenedor_grafico1'><canvas id='myChart'></canvas></div></div>");
            $("#contenedor_div_2").html(" <div  class='panel panel-success'><div class='panel-heading' style='text-align: center;'>Cantidad de emociones positivas<button type='submit' id='boton_grafico2' class='btn btn-info btn-sm' data-toggle='collapse' data-target='#demo'>Cambiar tipo</button></div><div class='panel-body' id='contenedor_grafico2'><canvas id='myChartt'></canvas></div></div>");

            $("#contenedor_div_3").html(" <div  class='panel panel-danger' ><div class='panel-heading' style='text-align: center;'>Cantidad de emociones negativas</div><div class='panel-body' id='contenedor_grafico_barra1'><canvas id='myCharttBar'></canvas></div></div></div>");

            $("#contenedor_div_4").html(" <div  class='panel panel-success' ><div class='panel-heading' style='text-align: center;'>Cantidad de emociones positivas</div><div class='panel-body' id='contenedor_grafico_barra2'><canvas id='myCharttBar'></canvas></div></div></div>");

            var i=0;
            if(respuesta.estado1==='nulo'){
                //notificacion de informacion de que está vacío                
                $("#contenedor_grafico_barra1").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
                $("#contenedor_grafico1").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones negativas en la base de datos.</div>");
            }
            var labels_neg = [];
            labels_neg.push("Miedo");
            labels_neg.push("Ira");
            labels_neg.push("Tristeza");
            labels_neg.push("Culpa");
            var data_neg = [];
            data_neg.push(respuesta.consult1);
            data_neg.push(respuesta.consult2);
            data_neg.push(respuesta.consult3);
            data_neg.push(respuesta.consult4);

            var labels_pos = [];
            labels_pos.push("Confianza");
            labels_pos.push("Amor");
            labels_pos.push("Alegria");
            labels_pos.push("Orgullo");
            var data_pos = [];
            data_pos.push(respuesta.consult5);
            data_pos.push(respuesta.consult6);
            data_pos.push(respuesta.consult7);
            data_pos.push(respuesta.consult8);

            var colores_pos = [];
            var colores_neg = [];
            for (var j = 0; j < 4; j++) {
                colores_pos.push(generateColor());
                colores_neg.push(generateColor());        
            }



            if (respuesta.estado1==='ok') {
                $("#myChartBar").remove();
                $("#contenedor_grafico_barra1").html("<canvas id='myChartBar'></canvas>");
                var ctx = $("#myChartBar"); 
                var myChartBar = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels_neg,
                        datasets: [{
                            label: 'Cantidad de emociones negativas',
                            data: data_neg,
                            backgroundColor: colores_neg,
                            borderColor: colores_neg,
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
                        }
                    }
                });
                $("#myChart").remove();
                $("#contenedor_grafico1").html("<canvas id='myChart'></canvas>");
                var ctx = $("#myChart"); 
                var myChartBar = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: labels_neg,
                        datasets: [{
                            label: 'Cantidad de emociones negativas',
                            data: data_neg,
                            backgroundColor: colores_neg,
                            borderColor: colores_neg,
                            borderWidth: 1
                        }]
                    }
                });
                
                $('#boton_grafico1').click(function(){
                    $("#myChart").remove();
                    $("#contenedor_grafico1").html("<canvas id='myChart'></canvas>");
                    i=i+1;
                    if (i==1){                    
                        var ctx = $("#myChart"); 
                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: labels_neg,
                                datasets: [{
                                    label: 'Cantidad de emociones negativas',
                                    data: data_neg,
                                    backgroundColor: colores_neg,
                                    borderColor: colores_neg,
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                    if(i==2){
                        var ctx = $("#myChart"); 
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels_neg,
                                datasets: [{
                                    label: 'Cantidad de emociones negativas',
                                    data: data_neg,
                                    backgroundColor: colores_neg,
                                    borderColor: colores_neg,
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                    if(i==3){                     
                        var ctx = $("#myChart"); 
                        var myChart = new Chart(ctx, {
                            type: 'radar',
                            data: {
                                labels: labels_neg,
                                datasets: [{
                                    label: 'Cantidad de emociones negativas',
                                    data: data_neg,
                                    backgroundColor: colores_neg,
                                    borderColor: colores_neg,
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
                                }
                            }
                        });
                        i=0;
                    }
                });
            }//fin if cantidad de emociones mayor que 0 (respuesta estado1 ok)
            if(respuesta.estado2==='nulo'){
                //notificacion de informacion de que está vacío                
                $("#contenedor_grafico_barra2").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones positivas en la base de datos.</div>");
                $("#contenedor_grafico2").html("<div class='alert alert-danger'><strong>Atención!</strong> Alumno no tiene registro de emociones positivas en la base de datos.</div>");
            }
            if (respuesta.estado2==='ok') {
                $("#myChartt").remove();
                $("#contenedor_grafico2").html("<canvas id='myChartt'></canvas>");

                var ctx = $("#myChartt");
                var myChartt = new Chart(ctx, {
                    type: 'polarArea',
                    data: {
                        labels: labels_pos,
                        datasets: [{
                            label: 'Cantidad de emociones positivas',
                            data: data_pos,
                            backgroundColor: colores_pos,
                            borderColor: colores_pos,
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
                        }
                    }
                });
                $("#myCharttBar").remove();
                $("#contenedor_grafico_barra2").html("<canvas id='myCharttBar'></canvas>");
                var ctx = $("#myCharttBar"); 
                var myChartt = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels_pos,
                        datasets: [{
                            label: 'Cantidad de emociones positivas',
                            data: data_pos,
                            backgroundColor: colores_pos,
                            borderColor: colores_pos,
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
                        }
                    }
                });
               

                var j=0;
                $('#boton_grafico2').click(function(){
                    $("#myChartt").remove();
                    $("#contenedor_grafico2").html("<canvas id='myChartt'></canvas>");
                    j=j+1;
                    if (j==1){                
                        var ctx = $("#myChartt"); 
                        var myChartt = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                               labels: labels_pos,
                                datasets: [{
                                    label: 'Cantidad de emociones positivas',
                                    data: data_pos,
                                    backgroundColor: colores_pos,
                                    borderColor: colores_pos,
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                    if(j==2){
                        var ctx = $("#myChartt"); 
                        var myChartt = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: labels_pos,
                                datasets: [{
                                    label: 'Cantidad de emociones positivas',
                                    data: data_pos,
                                     backgroundColor: colores_pos,
                                    borderColor: colores_pos,
                                    borderWidth: 1
                                }]
                            }
                        });
                    }
                    if(j==3){                 
                        var ctx = $("#myChartt"); 
                        var myChartt = new Chart(ctx, {
                            type: 'radar',
                            data: {
                                labels: labels_pos,
                                datasets: [{
                                    label: 'Cantidad de emociones positivas',
                                    data: data_pos,
                                    backgroundColor: colores_pos,
                                    borderColor: colores_pos,
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
                                }
                            }
                        });
                        j=0;
                    }                
                });                      
           }
        }//fin del if estado ok
    });//fin de funcion ajax

}//fin de la funcion js

