$(document).ready(function() {
    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results



    //Conjuntos Script JS
    $('#show-modal').click(function() {
        $('#nuevoConjunto').modal('show');
    });

    $('.cargar-conjunto').click(function() {
        var conjunto = $(this).attr("data-value");
        $('#cargarConjunto').modal('show');
        $('#conjunto_id').val(conjunto);

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

    $('.actualizar-administrador').click(function() {
        var admin = $(this).attr("data-value");
        console.log(admin)
        $.get( 'administradores/editar/'+admin,
            function(data) {
              $('#user_active').val(admin)
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
                $('#modal-actualizar-administrador').modal('show');
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
