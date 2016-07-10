@extends('backend.layout.dashboard')

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
                                        <a href="usuarios">
                                            <i class="fa fa-user" style="font-size: 60px;margin-right: 15px;"></i>
                                        </a>
                                        <a href="apartamentos">
                                            <i class="fa fa-building" style="font-size: 60px;margin-right: 15px;"></i>
                                        </a>
                                        <a href="zonas">
                                            <i class="fa fa-building-o" style="font-size: 60px;"></i>
                                        </a>

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
                                        <h3>Unidades</h3>
                                        <p>Ahora es mas facil poder administrar las unidades!</p>

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
                      Informacion detallada de las Unidades del Conjunto
                    </div>
                    <div class="pull-right" style="width: 50%;">
                        <div class="col-xs-6">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="show-modal-zona" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i> Nueva Unidad</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="panel-body">
                    <table class="table table-hover demo-table-dynamic" id="tableWithDynamicRows">
                        <thead>
                        <tr>
                            <th style="width: auto;">Tipo</th>
                            <th style="width: auto;">Unidad</th>
                            <th style="width: auto;">Apartamentos</th>
                            <th style="width: auto;">Usuarios</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        // Instance Class user

                        ?>

                        @foreach($zonas as $zona)
                        <tr>
                            <td class="v-align-middle">{{ $zona->tipo }}</td>
                            <td class="v-align-middle">{{ $zona->value }}</td>
                            <td class="v-align-middle"> Apartamentos</td>
                            <td class="v-align-middle"> Usuarios</td>
                            <td>
                                <div class="btn-group">

                                    <a href="zonas/eliminar/{{Crypt::encrypt($zona->id)}}" class="btn btn-danger eliminar-conjunto" ><i class="fa fa-trash-o"></i>
                                    </a>
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

@include('backend.administradores.zonas.nuevo')

@stop


@section('js_library')
    <script src="{{ asset('build/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
@stop

@section('specific_js')
    <script src="{{ asset('build/assets/js/init_a.js') }}" type="text/javascript"></script>
    <script src="{{ asset('build/assets/js/datatables.js') }}" type="text/javascript"></script>
@stop
