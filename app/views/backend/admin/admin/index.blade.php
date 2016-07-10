@extends('backend.layout.dashboard')

<!-- Create General Section Sidebar -->
@section('sidebar')
    <!-- Include the menu -->
    @include('backend.layout.menu.admin')
    @stop

            <!-- Create General Section Header -->
@section('head')
    <!-- Include the profile header -->
    @include('backend.layout.head')

@stop

@section('css')
    <style>
        .table thead tr th, .table tbody tr td {
            text-align: center;
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
                                <div class="col-lg-7 col-md-6 col-md-height col-middle bg-white">
                                    <!-- START PANEL -->
                                    <div class="full-height">
                                        <div class="panel-body text-center">
                                            <i class="fa fa-user" style="font-size: 60px;"></i>
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
                                            <h3>Administradores</h3>
                                            <p>Breaking convention again, we have inctroduced a notification system which variates based on the type and level of importance of the message. Thanks to this, an alert by the side of your screen would easily catch your attention.</p>

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
                                <button id="btn-create-admin" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Nuevo</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>


                    <div class="panel-body">
                        <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                            <thead>
                            <tr>
                                <th style="width: auto;">Identificacion</th>
                                <th style="width: auto;">Nombres</th>
                                <th style="width: auto;">Apellidos</th>
                                <th style="width: auto;">Username</th>
                                <th style="width: auto;">Email</th>
                                <th style="width: auto;">Telefono</th>
                                <th style="width: auto;">Celular</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($administradores as $key => $administrador)
                            <tr>
                                <td class="v-align-middle">{{ $administrador->identificacion }}</td>
                                <td class="v-align-middle">{{ $administrador->nombres }}</td>
                                <td class="v-align-middle">{{ $administrador->apellidos }}</td>
                                <td class="v-align-middle">{{ $administrador->username }}</td>
                                <td class="v-align-middle">{{ $administrador->email }}</td>
                                <td class="v-align-middle">{{ $administrador->telefono }}</td>
                                <td class="v-align-middle">{{ $administrador->celular }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success actualizar-administrador" data-value="{{Crypt::encrypt($administrador->id)}}"><i class="fa fa-pencil"></i>
                                        </button>
                                        <button type="button" class="btn btn-danger eliminar-administrador"  data-value="{{Crypt::encrypt($administrador->id)}}"><i class="fa fa-trash-o"></i>
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
            <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset">
                    <span class="hint-text">Copyright © 2014 </span>
                    <span class="font-montserrat">REVOX</span>.
                    <span class="hint-text">All rights reserved. </span>
                    <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
                </p>
                <p class="small no-margin pull-right sm-pull-reset">
                    <a href="#">Hand-crafted</a> <span class="hint-text">&amp; Made with Love ®</span>
                </p>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- END COPYRIGHT -->
    </div>
    <!-- END PAGE CONTENT WRAPPER -->



    @include('backend.admin.admin.nuevo')
    @include('backend.admin.admin.eliminar')
    @include('backend.admin.admin.actualizar')

@stop


@section('js_library')
    <script src="{{ asset('build/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>


    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
@stop

@section('specific_js')
    <script src="{{ asset('build/assets/js/init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/js/datatables.js') }}" type="text/javascript"></script>
@stop
