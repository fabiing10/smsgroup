@extends('backend.layout.mensajes')

<!-- Create General Section Sidebar -->
@section('sidebar')
<!-- Include the menu -->
@include('backend.layout.menu.usuarios')
@stop

<!-- Create General Section Header -->
@section('head')
<!-- Include the profile header -->
@include('backend.layout.head')

@stop

@section('css')
    <link href="{{ asset('build/assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet" type="text/css" media="screen">
    <style>

        .body-rsp {
            border-left: 1px solid rgb(219, 207, 207);
            padding-left: 11px;
        }

        .content-respuesta-data {
            border: 1px solid rgb(208, 204, 204);
            padding: 10px;
            background-color: rgb(236, 236, 236);
        }

        .answer-msj {
            border-bottom: 1px solid rgb(231, 229, 229);
            margin: 11px 0px;
        }
        .email-attachment {
            margin-top: 30px;
        }

        div#respuesta-content {
            border-left: 1px solid rgb(218, 218, 218);
            padding-left: 30px;
        }

        .thumbnail-wrapper.bordered.d32 {
            width: 45px;
            height: 45px;
        }
        .thumbnail-wrapper.bordered {
            border-width: 0px;
            border-style: solid;
        }

        .email-wrapper .email-opened .email-content-wrapper .email-content {
            margin: 0 auto;
            width: 90%;
            display: block;
            padding-top: 62px;
            padding-bottom: 70px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .email-wrapper .email-list .item {
            list-style: none;
            position: relative;
            border-bottom: 1px solid rgba(230, 230, 230, 0.7);
            height: inherit;
        }

    </style>

@stop


@section('content')
<div class="page-content-wrapper full-height">
    <!-- START PAGE CONTENT -->
    <div class="content full-height">
        <!-- START EMAIL -->
        <div class="email-wrapper">
            <!-- START EMAIL SIDEBAR MENU-->
            <!-- END EMAL SIDEBAR MENU -->
            <!-- START EMAILS LIST -->
            <div class="email-list b-r b-grey"> <a class="email-refresh" href="#"><i class="fa fa-refresh"></i></a>
                <div id="emailList">
                    <!-- START EMAIL LIST SORTED BY DATE -->
                    <!-- END EMAIL LIST SORTED BY DATE -->
                </div>
            </div>
            <!-- END EMAILS LIST -->
            <!-- START OPENED EMAIL -->
            <div class="email-opened">
                <div class="no-email">
                    <h1>No email has been selected</h1>
                </div>
                <div class="email-content-wrapper">
                    <div class="email-content">
                        <div class="email-content-header">
                            <div class="thumbnail-wrapper d48 circular bordered">
                                <img width="40" height="40" alt="" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar2x.jpg">
                            </div>
                            <div class="sender inline m-l-10">
                                <p class="name no-margin bold">
                                </p>
                                <p class="datetime no-margin"></p>
                            </div>
                            <div class="clearfix"></div>
                            <div class="subject m-t-20 m-b-20 semi-bold">
                            </div>

                        </div>
                        <div class="clearfix"></div>
                        <div class="email-content-body m-t-20">
                        </div>


                        <div class="email-attachment" style="display: none;">
                            <a href="" id="adjunto-href" target="_blank">
                                <button class="btn btn-primary btn-cons btn-animated from-top fa fa-arrow-down">
                                    <span>Adjunto</span>
                                </button>
                            </a>
                        </div>

                        <div class="email-answer-body m-t-20" style="display: none;" id="respuesta-content">
                            <h3>Respuesta</h3>

                            <div class="content-respuesta-data" style="display: none;">

                            </div>
                        </div>



                        <div class="wysiwyg5-wrapper b-a b-grey m-t-30 reply-msg">
                            {{ Form::open(array('url' => 'usuario/mensajes/responder', 'class' => '', 'id' => 'respuesta-form', 'role' => 'form','enctype'=>'multipart/form-data')) }}
                            <input type="hidden" name="mensaje-id" id="data-e" value="">
                            <textarea name="respuesta_mensaje" id="summernote"></textarea>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                                <button type="button" class="btn btn-cons">Close</button>
                            </div>

                            {{ Form::close() }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- END OPENED EMAIL -->
            <!-- START COMPOSE BUTTON FOR TABS -->
            <div class="compose-wrapper visible-xs">
                <a class="compose-email text-info pull-right m-r-10 m-t-10" href="email_compose.html"><i class="fa fa-pencil-square-o"></i></a>
            </div>
            <!-- END COMPOSE BUTTON -->
        </div>
        <!-- END EMAIL -->
    </div>
    <!-- END PAGE CONTENT -->
</div>
@stop


@section('js_library')

    <script src="{{ asset('build/assets/plugins/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
@stop

@section('specific_js')
<script src="{{ asset('build/assets/js/init_a.js') }}" type="text/javascript"></script>
@stop