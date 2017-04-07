$(document).ready(function() {

    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results

    $('#cargar-documento').click(function() {
        $('#modal-nuevo-documento').modal('show');
    });
    //Conjuntos Script JS
    $('#nuevo-apartamento').click(function() {
        $('#modal-nuevo-apartamento').modal('show');
    });

    $('#nuevo-usuario').click(function() {
        $('#modal-nuevo-usuario').modal('show');
    });

    $('.actualizar-usuario').click(function() {


        $('#modal-actualizar-usuario').modal('show');

        var id = $(this).attr("data-value");
         $.get( 'usuarios/listar/'+id,

         function(data) {

             $('#user_active').val(id)
             $('#u_identificacion').val(data.identificacion)
             $('#u_nombres').val(data.nombres)
             $('#u_apellidos').val(data.apellidos)
             $('#u_fecha_nacimiento').val(data.fecha_nacimiento)
             $('#u_email').val(data.email)
             $('#u_telefono').val(data.telefono)
             $('#u_celular').val(data.celular)
             $('#u_username').val(data.username)
        })
        .done(function() {
            $('#modal-actualizar-usuario').modal('show');
        })
        .fail(function() {
        })
        .always(function() {

        })
    });



    $('#show-modal-zona').click(function() {
        $('#modal-nueva-zona').modal('show');
    });


    $('#zona_select').change(function() {

        var zona = $(this).val();
        $('#apartamento_select').empty();
        var select = document.getElementById('apartamento_select');
        $.get( 'apartamentos/listar/'+zona,
            function(data) {

                var list = $('#apartamento_select');
                $.each(data, function(idx, obj) {

                    var option = new Option(obj.apartamento, obj.id);
                    select.add(option);

                });

            })
            .done(function() {

            })
            .fail(function() {
            })
            .always(function() {

            });

    });

    $('#zona_select_update').change(function() {
        console.log("Update User")
        var zona = $(this).val();
        $('#apartamento_select_update').empty();
        var select = document.getElementById('apartamento_select_update');
        $.get( 'apartamentos/listar/'+zona,
            function(data) {

                var list = $('#apartamento_select_update');
                $.each(data, function(idx, obj) {

                    var option = new Option(obj.apartamento, obj.id);
                    select.add(option);

                });

            })
            .done(function() {

            })
            .fail(function() {
            })
            .always(function() {

            });

    });



    $('.actualizar-conjunto').click(function() {
        var conjunto = $(this).attr("data-value");
        $.get( 'conjuntos/editar/'+conjunto,

            function(data) {
                $('#u_nit').val(data.nit)
                $('#u_tipo').val(data.tipo)
                $('#u_nombre').val(data.nombre)
                $('#u_pais').val(data.pais)
                $('#u_ciudad').val(data.ciudad)
                $('#u_localidad').val(data.localidad)
                $('#u_barrio').val(data.barrio)
                $('#u_direccion').val(data.direccion)
                $('#u_telefono').val(data.telefono)
                $('#u_estrato').val(data.estrato)
                $('#u_telefono_cuadrante').val(data.telefono_cuadrante)
                $('#u_latitud').val(data.map_latitud)
                $('#u_longitud').val(data.map_longitud)
                $('#u_longitud').val(data.map_longitud)
                $('#actualizar-c').val(conjunto);
            })
            .done(function() {
                $('#actualizarConjunto').modal('show');
            })
            .fail(function() {
            })
            .always(function() {

            });
    });


    $('.eliminar-conjunto').click(function() {
        $('#eliminarConjunto').modal('show');
        $('#value-c').val($(this).attr("data-value"));
    });

    $('.c-a-e-conjunto').click(function() {
        $('#eliminarConjunto').modal('hide');
    });




    $('#btn-create-admin').click(function() {
        $('#modal-nuevo-administrador').modal('show');
    });
    $('.eliminar-administrador').click(function() {
        $('#eliminarAdministrador').modal('show');
        $('#value-a').val($(this).attr("data-value"));
    });







});
