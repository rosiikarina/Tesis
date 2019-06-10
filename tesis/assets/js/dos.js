function modificar(nombre, variable){
    var url = "tres.php";
    var parametros ={
            "nombre" : nombre,
            "variable" : variable
    };
    $.ajax({
        data:  parametros,
        url:   url,
        type:  'post',
        beforeSend: function () {
                $("#resultado").html("Procesando, espere por favor...");
        },
        success:  function (response) {
                $("#resultado").html(response);
        }
    });
}