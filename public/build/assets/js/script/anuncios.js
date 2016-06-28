$(document).ready(function() {

    //Conjuntos Script JS
    $('#nuevo-anuncio').click(function() {
        $('#modal-nuevo-anuncio').modal('show');
    });

    //Conjuntos Script JS
    $('.anuncio-btn').click(function() {

        var value = $(this).attr("data-value");
        $(".into-body").html("");
        $.get( 'anuncios/listar/'+value,

            function(data) {


                $.each(data, function(idx, obj) {

                    $("#title").html(obj.nombre);
                    var url = '/uploads/anuncios/'+obj.img_banner;
                    $("#img-profile").attr('src',url);
                    $("#img-profile").fadeIn();
                    $(".into-body").html(obj.descripcion);




                });

            })
            .done(function() {
                $('#modal-detalles-anuncio').modal('show');
            })
            .fail(function() {
            })
            .always(function() {

            });

    });

});


