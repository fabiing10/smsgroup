(function($) {
    'use strict';

    $('#summernoteAdmin').summernote({
        height: 200,
        onfocus: function(e) {
            $('body').addClass('overlay-disabled');
        },
        onblur: function(e) {
            $('body').removeClass('overlay-disabled');
        }
    });

    $('#summernote').summernote({
        height: 200,
        onfocus: function(e) {
            $('body').addClass('overlay-disabled');
        },
        onblur: function(e) {
            $('body').removeClass('overlay-disabled');
        }
    });

    // Wysiwyg editor custom options

    var editorOptions = {
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": false, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": false, //Button which allows you to edit the generated HTML. Default false
        "link": true, //Button to insert a link. Default true
        "image": true, //Button to insert an image. Default true,
        "color": false, //Button to change color of font
        "blockquote": true, //Blockquote
        stylesheets: ["pages/css/editor.css"],
        customTemplates: editorTemplate
    };


    var editorTemplate = {
        "font-styles": function(locale) {
            return '<li class="dropdown dropup">' + '<a data-toggle="dropdown" class="btn btn-default dropdown-toggle ">    <span class="glyphicon glyphicon-font"></span>    <span class="current-font">Normal text</span>    <b class="caret"></b>  </a>' + '<ul class="dropdown-menu">    <li><a tabindex="-1" data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal text</a></li>     <li><a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 1</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 2</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 3</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 4</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 5</a></li>    <li><a tabindex="-1" data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Heading 6</a></li>  </ul>' + '</li>';
        },
        emphasis: function(locale) {
            return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-bold"></i></a>' + '<a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-italic"></i></a>' + '<a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-underline"></i></a>' + '</div>' + '</li>';
        },
        blockquote: function(locale) {
            return '<li>' + '<a tabindex="-1" data-wysihtml5-display-format-name="false" data-wysihtml5-command-value="blockquote" data-wysihtml5-command="formatBlock" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-quote"></i>' + '</a>' + '</li>'
        },
        lists: function(locale) {
            return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="Unordered list" data-wysihtml5-command="insertUnorderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ul"></i></a>' + '<a tabindex="-1" title="Ordered list" data-wysihtml5-command="insertOrderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ol"></i></a>' + '<a tabindex="-1" title="Outdent" data-wysihtml5-command="Outdent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-outdent"></i></a>' + '<a tabindex="-1" title="Indent" data-wysihtml5-command="Indent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-indent"></i></a>' + '</div>' + '</li>'
        },
        image: function(locale) {
            return '<li>' + '<div class="bootstrap-wysihtml5-insert-image-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert image</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-image-url form-control" value="http://">' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary">Insert image</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-image"></i>' + '</a>' + '</li>'
        },
        link: function(locale) {
            return '<li>' + '<div class="bootstrap-wysihtml5-insert-link-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert link</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-link-url form-control" value="http://">' + '<div class="checkbox check-success"> <input type="checkbox" class="bootstrap-wysihtml5-insert-link-target" checked="checked" value="1" id="link-checkbox"> <label for="link-checkbox">Open link in new window</label></div>' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-link"></i>' + '</a>' + '</li>'
        }
    }


    $('#mark-email').click(function() {
        $('.item .checkbox').toggle();
    });

    // Load list of emails
    $('.email-list').length && $.ajax({
        dataType: "json",
        //url: "http://revox.io/json/emails.json",
        url: "mensajes/listar",
        success: function(data) {

            $.each(data.emails, function(i) {

                var obj = data.emails[i];



                var listViewGroupCont = $('<div/>', {
                    "class": "list-view-group-container"
                });
                listViewGroupCont.append('<div class="list-view-group-header"><span>' + obj.importancia + '</span></div>');
                var ul = $('<ul/>', {
                    "class": "no-padding"
                });

                    var id = obj.id;
                    //var to = $this.to.join();
                    var subject = obj.asunto;
                    var time = obj.fecha;

                    var colors = ['b-success', 'b-primary', 'b-warning', 'b-info', 'b-complete', 'b-danger'];
                    var color = colors[Math.floor(Math.random() * (6))];
                    var li = '<li class="item padding-15" data-email-id="' + id + '"> \
                                <div class="thumbnail-wrapper d32 circular bordered ' + color + '"> \
                                    <img width="40" height="40" alt="/build/assets/img/user.png" data-src-retina="/build/assets/img/user.png" data-src="/build/assets/img/user.png" src="/build/assets/img/user.png"> \
                                </div> \
                               \
                                <div class="inline m-l-15"> \
                                    <p class="recipients no-margin hint-text small"> To</p> \
                                    <p class="subject no-margin">' + subject + '</p> \
                                </div> \
                                <div class="datetime">' + time + '</div> \
                                <div class="clearfix"></div> \
                            </li>';
                    ul.append(li);


                listViewGroupCont.append(ul);

                $('#emailList').append(listViewGroupCont);
            });


            $("#emailList").ioslist();

        }
    });

    $('body').on('click', '.item .checkbox', function(e) {
        e.stopPropagation();
    });

    $('body').on('click', '.item', function(e) {
        e.stopPropagation();

        var id = $(this).attr('data-email-id');
        var email = null;
        var thumbnailWrapper = $(this).find('.thumbnail-wrapper');

        $.ajax({
            dataType: "json",
            url: "mensajes/listar/"+id,
            success: function(data) {

                var emailOpened = $('.email-opened');
                emailOpened.find('.sender .name').text("Administrador");
                emailOpened.find('.sender .datetime').text(data.fecha);
                emailOpened.find('.subject').text(data.asunto);
                emailOpened.find('.email-content-body').html(data.mensaje);

                var thumbnailClasses = thumbnailWrapper.attr('class').replace('d32', 'd48');
                emailOpened.find('.thumbnail-wrapper').html(thumbnailWrapper.html()).attr('class', thumbnailClasses);

                $('.no-email').hide();
                $('.actions-dropdown').toggle();
                $('.actions, .email-content-wrapper').show();
                if ($.Pages.isVisibleSm() || $.Pages.isVisibleXs()) {
                    $('.email-list').toggleClass('slideLeft');
                }

                if(data.respuesta == "1"){
                    $(".reply-msg").fadeIn();
                    $("#respuesta-content").fadeIn();
                    listarRespuestas(id);
                    $("#data-e").val(id);
                    !$('.email-reply').data('wysihtml5') && $('.email-reply').wysihtml5(editorOptions);

                }else{
                    $( ".content-respuesta-data" ).empty();
                    $("#respuesta-content").fadeOut();
                    $(".reply-msg").fadeOut();

                }

                if(data.Adjunto == "0"){

                }else{
                    $(".email-attachment").fadeIn();
                    getAttachment(id);

                }



                $(".email-content-wrapper").scrollTop(0);

                // Initialize email action menu
                $('.menuclipper').menuclipper({
                    bufferWidth: 20
                });

            }
        });

        $('.item').removeClass('active');
        $(this).addClass('active');

    });

    // Toggle email sidebar on mobile view
    $('.toggle-email-sidebar').click(function(e) {
        e.stopPropagation();
        $('.email-sidebar').toggle();
    });

    $('.email-list-toggle').click(function() {
        $('.email-list').toggleClass('slideLeft');
    });

    $('.email-sidebar').click(function(e) {
        e.stopPropagation();
    })

    $(window).resize(function() {

        if ($(window).width() <= 1024) {
            $('.email-sidebar').hide();

        } else {
            $('.email-list').length && $('.email-list').removeClass('slideLeft');
            $('.email-sidebar').show();
        }
    });


    // Email composer
    var emailComposerToolbarTemplate = {
        "font-styles": function(locale) {
            return '<li class="dropdown">' + '<a data-toggle="dropdown" class="btn btn-default dropdown-toggle ">' + '<span class="editor-icon editor-icon-headline"></span>' + '<span class="current-font">Normal</span>' + '<b class="caret"></b>' + '</a>' + '<ul class="dropdown-menu">' + '<li><a tabindex="-1" data-wysihtml5-command-value="p" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">Normal</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h1" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">1</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h2" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">2</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h3" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">3</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h4" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">4</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h5" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">5</a></li>' + '<li><a tabindex="-1" data-wysihtml5-command-value="h6" data-wysihtml5-command="formatBlock" href="javascript:;" unselectable="on">6</a></li>' + '</ul>' + '</li>';
        },
        emphasis: function(locale) {
            return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="CTRL+B" data-wysihtml5-command="bold" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-bold"></i></a>' + '<a tabindex="-1" title="CTRL+I" data-wysihtml5-command="italic" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-italic"></i></a>' + '<a tabindex="-1" title="CTRL+U" data-wysihtml5-command="underline" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-underline"></i></a>' + '</div>' + '</li>';
        },
        blockquote: function(locale) {
            return '<li>' + '<a tabindex="-1" data-wysihtml5-display-format-name="false" data-wysihtml5-command-value="blockquote" data-wysihtml5-command="formatBlock" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-quote"></i>' + '</a>' + '</li>'
        },
        lists: function(locale) {
            return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="Unordered list" data-wysihtml5-command="insertUnorderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ul"></i></a>' + '<a tabindex="-1" title="Ordered list" data-wysihtml5-command="insertOrderedList" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-ol"></i></a>' + '<a tabindex="-1" title="Outdent" data-wysihtml5-command="Outdent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-outdent"></i></a>' + '<a tabindex="-1" title="Indent" data-wysihtml5-command="Indent" class="btn  btn-default" href="javascript:;" unselectable="on"><i class="editor-icon editor-icon-indent"></i></a>' + '</div>' + '</li>'
        },
        image: function(locale) {
            return '<li>' + '<div class="bootstrap-wysihtml5-insert-image-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert image</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-image-url form-control" value="http://">' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary">Insert image</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert image" data-wysihtml5-command="insertImage" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-image"></i>' + '</a>' + '</li>'
        },
        link: function(locale) {
            return '<li>' + '<div class="bootstrap-wysihtml5-insert-link-modal modal fade">' + '<div class="modal-dialog ">' + '<div class="modal-content">' + '<div class="modal-header">' + '<a data-dismiss="modal" class="close">×</a>' + '<h3>Insert link</h3>' + '</div>' + '<div class="modal-body">' + '<input class="bootstrap-wysihtml5-insert-link-url form-control" value="http://">' + '<label class="checkbox"> <input type="checkbox" checked="" class="bootstrap-wysihtml5-insert-link-target">Open link in new window</label>' + '</div>' + '<div class="modal-footer">' + '<a data-dismiss="modal" class="btn btn-default">Cancel</a>' + '<a data-dismiss="modal" class="btn btn-primary" href="#">Insert link</a>' + '</div>' + '</div>' + '</div>' + '</div>' + '<a tabindex="-1" title="Insert link" data-wysihtml5-command="createLink" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-link"></i>' + '</a>' + '</li>'
        },
        html: function(locale) {
            return '<li>' + '<div class="btn-group">' + '<a tabindex="-1" title="Edit HTML" data-wysihtml5-action="change_view" class="btn  btn-default" href="javascript:;" unselectable="on">' + '<i class="editor-icon editor-icon-html"></i>' + '</a>' + '</div>' + '</li>'
        }
    }

    setTimeout(function() {
        $('.email-body').length && $('.email-body').wysihtml5({
            html: true,
            stylesheets: ["pages/css/editor.css"],
            customTemplates: emailComposerToolbarTemplate
        });

        $('.email-composer .wysihtml5-toolbar').appendTo('.email-toolbar-wrapper');
    }, 500);


    function getAttachment(id){
        $.ajax({
            dataType: "json",
            url: "mensajes/adjunto/"+id,
            success: function(data) {

                var ruta = "/uploads/";
                var link;
                $.each(data, function(idx, obj) {

                    var extension;
                    if(obj.tipo == "image/png"){
                      extension = ".png";
                    }else if(obj.tipo == "application/pdf"){
                      extension = ".pdf";
                    }else if(obj.tipo == "image/jpeg"){
                      extension = ".jpg";
                    }else if(obj.tipo == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
                      extension = ".docx";
                    }else{
                      extension = ".doc";
                    }

                    link = ruta+obj.nombre+extension;

                    $("#adjunto-href").attr("href", link);
                });


            }
        });
    }

    function listarRespuestas(id){
        $.ajax({
            dataType: "json",
            url: "mensajes/respuestas/"+id,
            success: function(data) {
                $( ".content-respuesta-data" ).empty();
                $(".content-respuesta-data").fadeIn();
                $.each(data, function(idx, obj) {

                    $(".content-respuesta-data").append("<div class='answer-msj'>"+obj.mensaje+"</div>");
                });


            }
        });
    }

    $('#respuesta-form').submit(function(event) {

        // get the form data
        // there are many ways to get this data using jQuery (you can use the class or id also)
        var formData = {
            'mensaje-id'              : $('input[name=mensaje-id]').val(),
            'respuesta_mensaje'       : $("#summernoteAdmin").val()
        };

        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'mensajes/responder', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode          : true
        })
            // using the done promise callback
            .done(function(data) {
                $( ".content-respuesta-data" ).empty();
                $(".content-respuesta-data").fadeIn();
                // log data to the console so we can see
                $.each(data, function(idx, obj) {

                    $(".content-respuesta-data").append("<div class='answer-msj'>"+obj.mensaje+"</div>");


                });
                $("#summernoteAdmin").html("");


                // here we will handle errors and validation messages
            });

        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });


})(window.jQuery);
