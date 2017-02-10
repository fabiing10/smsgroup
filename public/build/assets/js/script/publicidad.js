$(document).ready(function() {

    //Conjuntos Script JS
    $('#nuevo-anuncio').click(function() {
        $('#modal-nuevo-anuncio').modal('show');
    });


});

function loadPublicity(id){

  $.get( 'publicidad/'+id,

      function(data) {


          $.each(data, function(idx, obj) {

              $("#name").html(obj.tienda);
              var url = '/uploads/publicidad/'+obj.img_publicidad;

              var urlString = 'url(' + url + ')';
              document.getElementById('img').style.backgroundImage =  urlString;

              $("#descripcion").html(obj.descripcion);
              $("#valor").html(obj.valor);




          });

      })
      .done(function() {
          $('#modal-detalles-anuncio').modal('show');
      })
      .fail(function() {
      })
      .always(function() {

      });


}
