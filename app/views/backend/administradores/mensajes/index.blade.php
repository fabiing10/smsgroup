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

    p.title {
        font-size: 15px;
        border-left: 3px solid gray;
        padding: 10px;
        background-color: rgb(229, 229, 229);
        width: 25%;
        margin-bottom: 10px;
    }

    .panel .panel-heading .panel-title {
        font-family: 'Montserrat';
        text-transform: none;
    }
    .body-rsp {
        border-bottom: 1px solid rgb(236, 236, 236);
        background-color: rgb(236, 236, 236);
        padding: 15px;
        margin-bottom: 11px;
    }
    .content-respuesta-data {
        border: 1px solid rgb(219, 219, 219);
        padding: 10px;
        border-radius: 5px;
    }
    .table thead tr th, .table tbody tr td {
        text-align: center;
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

                            <div class="col-lg-12 col-md-height col-md-12 col-top">
                                <!-- START PANEL -->
                                <div class="panel panel-transparent">
                                    <div class="panel-body">
                                        <h3>Mensajes</h3>
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
                    <div class="panel-title">
                    </div>
                    <div class="pull-right" style="width: 50%;">
                        <div class="col-xs-6">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="nuevo-mensaje" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Escribir mensaje</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

                <div class="panel-body">
                    <table class="table table-hover demo-table-dynamic" id="dataTableMensajeGral">
                        <thead>
                        <tr>
                            <th style="width: auto;">Fecha</th>
                            <th style="width: auto;">Tipo</th>
                            <th style="width: auto;">Clasificacion</th>
                            <th style="width: auto;">Asunto</th>
                            <th style="width: auto;">Adjunto</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($mensajes as $mensaje)
                        <tr>
                            <td class="v-align-middle">{{ $mensaje->fecha }}</td>
                            <td class="v-align-middle">{{ $mensaje->tipo }}</td>
                            <td class="v-align-middle">{{ $mensaje->importancia }}</td>
                            <td class="v-align-middle">{{ $mensaje->asunto }}</td>

                            @if($mensaje->Adjunto == 1)
                                <td class="v-align-middle">Si</td>
                            @else
                                <td class="v-align-middle">No</td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-cons btn-animated from-left pg pg-mail" data-value="{{Crypt::encrypt($mensaje->id)}}" onclick='showDetalles("{{Crypt::encrypt($mensaje->id)}}")'>
                                        <span>Detalles</span>
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


@include('backend.administradores.mensajes.nuevo')
@include('backend.administradores.mensajes.detalles')


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
<script src="{{ asset('build/assets/js/script/mensajes.js') }}" type="text/javascript"></script>

@stop