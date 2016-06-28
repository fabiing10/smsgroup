$(document).ready(function() {
    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results


    //Conjuntos Script JS
    $('#nuevo-mensaje').click(function() {
        $('#modal-nuevo-mensaje').modal('show');
    });

    $('#adjunto-opt').change(function() {


        if($("#adjunto-opt").is(':checked')) {
            $(".file_upload").fadeIn();
        } else {
            $(".file_upload").fadeOut();
        }

    });


    /*$("#adjunto-opt").on( "click", function() {
     alert( $( "input:checked" ).val() + " is checked!" );
     });*/



    $('#send_to').change(function() {

        var option = $(this).val();

        //Listar Zonas de un conjunto
        if(option == "zona"){

            $('#zona_display').fadeIn();
            $('#apartamento_display').fadeOut();

            $('#zona_select').empty();
            var select = document.getElementById('zona_select');

            $.get( 'zonas/listar/',
                function(data) {

                    var list = $('#zona_select');
                    $.each(data, function(idx, obj) {

                        var option = new Option(obj.tipo + ' ' +obj.value, obj.id);
                        select.add(option);

                    });

                })
                .done(function() {

                })
                .fail(function() {
                })
                .always(function() {

                });

        }else if(option == "apartamento"){
            $('#zona_display').fadeOut();
            $('#apartamento_display').fadeIn();

            $('#apartamento_select').empty();
            var select = document.getElementById('apartamento_select');

            $.get( 'apartamentos/listar/',
                function(data) {

                    var list = $('#apartamento_select');
                    $.each(data, function(idx, obj) {

                        var option = new Option(obj.tipo +' '+obj.value +' - '+ obj.apartamento, obj.id);
                        select.add(option);

                    });

                })
                .done(function() {

                })
                .fail(function() {
                })
                .always(function() {

                });


        }else if(option == "todos"){
            $('#zona_display').fadeOut();
            $('#apartamento_display').fadeOut();
        }else{
            $('#zona_display').fadeOut();
            $('#apartamento_display').fadeOut();
            console.log("None select")
        }




    });

    $('.detalles-respuesta').click(function() {
        var detalles_id =  $(this).attr('data-details');
        alert(detalles_id);
    });


});

function detallesRespuesta(id,u_id){

    $(".content-respuesta-data").html("");

    $.get( 'mensajes/listar/respuestas/'+id+'-'+u_id,
        function(data) {

            $.each(data, function(idx, obj) {
                $(".content-respuesta-data").append("<div class='body-rsp'><p class='title'>"+obj.fecha+"</p><div class='contenido-r'>"+obj.mensaje+"</div></span>");
            });

        })
        .done(function() {

        })
        .fail(function() {
        })
        .always(function() {

        });

}
function showDetalles(value){

    $.get( 'mensajes/listar/'+value,

        function(data) {
            $('#inner-subject').html(data.asunto)
            $('#inner-date').html(data.fecha)
            $('#inner-msg').html(data.mensaje)
            if(data.Adjunto == 1){
                $( "#attachment" ).empty();
                $("#attachment").fadeIn();
                $("#attachment").append("<a target='_blank' href='/files/adjunto/"+data.id+"'  class='btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down'><span>Ver adjunto</span></a> ");

            }else{
                $( "#attachment" ).empty();
            }

        })
        .done(function() {
            $('#modal-detalles-mensaje').modal('show');

            $.get( 'mensajes/reporte/'+value,
                function(data) {

                    var table = $('#dataTableReporteMensajeGral').DataTable();
                    var leido;
                    var fecha;
                    table.clear();
                    $.each(data, function(idx, obj) {


                        if(obj.leido == 0){
                            leido = 'No'
                        }else{
                            leido = 'Si'
                        }

                        if(obj.fecha_leido == "0000-00-00"){
                            fecha = "";
                        }else{
                            fecha = obj.fecha_leido;
                        }
<<<<<<< HEAD
                        data = [obj.tipo+' '+obj.value ,obj.apartamento,obj.nombres,obj.apellidos,leido,fecha,"<a target='_blank' class='btn btn-primary btn-cons' href='mensajes/pdf/"+obj.id+"' class='asd' >Detalles</a>"]
=======
                        data = [obj.tipo+' '+obj.value ,obj.apartamento,obj.nombres,obj.apellidos,leido,fecha,"<a class='btn btn-primary btn-cons' target='_blank' href='mensajes/pdf/"+obj.id+"'>PDF</a>"]
>>>>>>> fec1d7fce866ecb23c601393d597f878dc014db2
                        table.row.add(data).draw();

                    });


                })
                .done(function() {

                })
                .fail(function() {
                })
                .always(function() {

                });


            //DataTable Respuestas  Init

            $.get( 'mensajes/respuestas/'+value,
                function(data) {

                    var table = $('#dataTableRespuestasMensaje').DataTable();
                    var leido;
                    var fecha;
                    table.clear();
                    $.each(data, function(idx, obj) {
                        var button = '<button type="button" class="btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down detalles-respuesta" onclick="detallesRespuesta('+obj.id+','+obj.u_id+')"><span>Detalles</span></button>';
                        data = [obj.nombres,obj.apellidos,obj.tipo+' '+obj.value,obj.apartamento,button  ]
                        table.row.add(data).draw();

                    });


                })
                .done(function() {

                })
                .fail(function() {
                })
                .always(function() {

                });







        })
        .fail(function() {
        })
        .always(function() {

        });
}
