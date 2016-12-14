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
                            <div class="col-lg-7 col-md-6 col-md-height col-middle bg-usuarios" style="padding: 8% 0px;">
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
                                        <h3>Usuarios</h3>
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
                    <div class="pull-right" style=" width: 50%;">
                        <div class="col-xs-6">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                        <div class="col-xs-6">
                            <button id="nuevo-usuario" class="btn btn-primary btn-cons"><i class="fa fa-plus"></i>Nuevo Usuario</button>
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
                            <th style="width: auto;">Email</th>
                            <th style="width: auto;">Telefono</th>
                            <th style="width: auto;">Celular</th>
                            <th style="width: auto;">Unidad</th>
                            <th style="width: auto;">Apartamento</th>
                            <th style="width: auto;">Residente</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data as $value)
                        <tr>
                            <td class="v-align-middle">{{ $value->identificacion }}</td>
                            <td class="v-align-middle">{{ $value->nombres }}</td>
                            <td class="v-align-middle">{{ $value->apellidos }}</td>
                            <td class="v-align-middle">{{ $value->email }}</td>
                            <td class="v-align-middle">{{ $value->telefono }}</td>
                            <td class="v-align-middle">{{ $value->celular }}</td>
                            <td class="v-align-middle">{{ $value->tipo }} - {{ $value->value }}</td>
                            <td class="v-align-middle">{{ $value->apartamento }}</td>

                            @if ($value->propietario== 1)
                            <td class="v-align-middle">Propietario</td>
                            @else
                            <td class="v-align-middle">Arrendatario</td>
                            @endif



                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success actualizar-usuario" data-value="{{Crypt::encrypt($value->id)}}"><i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger actualizar-usuario"  data-value="{{Crypt::encrypt($value->id)}}"><i class="fa fa-trash-o"></i>
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


@include('backend.administradores.usuarios.nuevo')
@include('backend.administradores.usuarios.actualizar')

@stop


@section('js_library')
<script src="{{ asset('build/assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/datatables.responsive.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/plugins/datatables-responsive/js/lodash.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
@stop

@section('specific_js')
<script src="{{ asset('build/assets/js/init_a.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/js/datatables.js') }}" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {

    // Initializes search overlay plugin.
    // Replace onSearchSubmit() and onKeyEnter() with
    // your logic to perform a search and display results
    $( "#fecha_nacimiento" ).datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true
    });
    $( "#u_fecha_nacimiento" ).datepicker({
          dateFormat: 'yy-mm-dd',
          changeMonth: true,
          changeYear: true
    });

  });
</script>
@stop
