@extends('backend.layout.mensajes')

<!-- Create General Section Sidebar -->
@section('sidebar')
    <!-- Include the menu -->
    @include('backend.layout.menu.administradores')
    @stop

            <!-- Create General Section Header -->
@section('head')
    <!-- Include the profile header -->
    @include('backend.layout.head')

@stop

@section('css')

    <link href="{{ asset('build/assets/plugins/bootstrap-tag/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/assets/plugins/dropzone/css/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('build/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('build/assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('build/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet" type="text/css" media="screen">
    <link href="{{ asset('build/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" media="screen">


    <style>
        .table thead tr th, .table tbody tr td {
            text-align: center;
        }
        .modal-backdrop.in {
            opacity: 1;
            background: rgba(245,245,245,1);
            background: -moz-radial-gradient(center, ellipse cover, rgba(245,245,245,1) 18%, rgba(230,230,230,1) 49%, rgba(204,204,204,1) 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(18%, rgba(245,245,245,1)), color-stop(49%, rgba(230,230,230,1)), color-stop(100%, rgba(204,204,204,1)));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(245,245,245,1) 18%, rgba(230,230,230,1) 49%, rgba(204,204,204,1) 100%);
            background: -o-radial-gradient(center, ellipse cover, rgba(245,245,245,1) 18%, rgba(230,230,230,1) 49%, rgba(204,204,204,1) 100%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(245,245,245,1) 18%, rgba(230,230,230,1) 49%, rgba(204,204,204,1) 100%);
            background: radial-gradient(ellipse at center, rgba(245,245,245,1) 18%, rgba(230,230,230,1) 49%, rgba(204,204,204,1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#cccccc', GradientType=1 );
        }
        .modal-content {
            width: 71%;
            margin: 0 auto;
            margin-top: 15px;
        }
        .fs-14 {
            font-size: 37px !important;
            color: rgb(70, 211, 206);
            opacity: 1;
        }
        .close {
            opacity: 1;
        }

    </style>
@stop

@section('content')
    <!-- START PAGE CONTENT WRAPPER -->
    <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->



        <div class="content">
            <!-- START JUMBOTRON -->
            <div class="jumbotron" data-pages="parallax">
                <div class="container-fluid container-fixed-lg">
                    <div class="inner">
                        <!-- START BREADCRUMB -->
                        <ul class="breadcrumb">
                            <li>
                                <p>Inicio</p>
                            </li>

                        </ul>
                        <!-- END BREADCRUMB -->
                        <div class="container-md-height m-b-20">
                            <div class="row row-md-height">
                                <div class="col-lg-7 col-md-6 col-md-height col-middle bg-anuncios" style="padding: 8% 0px;">
                                    <!-- START PANEL -->
                                    <div class="full-height">
                                        <div class="panel-body text-center">

                                        </div>
                                    </div>
                                    <!-- END PANEL -->
                                </div>
                                <div class="col-lg-5 col-md-height col-md-6 col-top">
                                    <!-- START PANEL -->
                                    <div class="panel panel-transparent">
                                        <div class="panel-heading">
                                            <div class="panel-title">Bienvenido(a)  {{ Auth::user()->nombres }}
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <h3>Anuncios</h3>
                                            <p>En esta seccion podras informar a toda tu comunidad por medio de anuncios o publicaciones.</p>

                                        </div>
                                    </div>
                                    <!-- END PANEL -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END JUMBOTRON -->

            <!-- END CONTAINER FLUID -->

            <!-- START CONTAINER FLUID -->
            <div class="container-fluid container-fixed-lg">
                <!-- START PANEL -->
                <div class="panel panel-transparent">


                    <div class="panel-heading">
                        <div class="panel-title">Pages Default Tables Style
                        </div>
                        <div class="pull-right" style="width: 50%;">
                            <div class="col-xs-6">
                                <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                            </div>
                            <div class="col-xs-6">
                                <button id="nuevo-anuncio" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Crear Anuncio</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="panel-body">
                        <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                            <thead>
                            <tr>
                                <th style="width: auto;">Fecha</th>
                                <th style="width: auto;">Nombre</th>
                                <th style="width: auto;">Autor</th>
                                <th style="width: auto;">Acciones</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            // Instance Class user

                            ?>

                            @foreach($anuncios as $anuncio)
                                <tr>
                                    <td class="v-align-middle">{{ $anuncio->fecha }}</td>
                                    <td class="v-align-middle">{{ $anuncio->nombre }}</td>
                                    <td class="v-align-middle">{{ $anuncio->autor }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-danger eliminar-anuncio"  data-value="{{Crypt::encrypt($anuncio->id)}}"><i class="fa fa-trash-o"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END PANEL -->
            </div>
            <!-- END CONTAINER FLUID -->


        </div>
        <!-- END PAGE CONTENT -->
        <!-- START COPYRIGHT -->
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg footer">
            @include('backend.layout.footer')
        </div>
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->


    @include('backend.administradores.anuncios.nuevo')


@stop


@section('js_library')

    <script type="text/javascript" src="{{ asset('build/assets/plugins/jquery-autonumeric/autoNumeric.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/dropzone/dropzone.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/bootstrap-tag/bootstrap-tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/jquery-inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/summernote/js/summernote.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('build/assets/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>


    <script src="{{ asset('build/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
    <script src="{{ asset('build/assets/js/datatables.js') }}" type="text/javascript"></script>
@stop

@section('specific_js')
    <script src="{{ asset('build/assets/js/form_elements.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/js/script/anuncios.js') }}" type="text/javascript"></script>

@stop
