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

    <div class="social-wrapper">
    <div class="social " data-pages="social">
    <!-- START JUMBOTRON -->
    <div class="jumbotron" data-pages="parallax" data-social="cover">
        <div class="cover-photo">
            <img alt="Cover photo" src="{{ asset('uploads/banners/prueba.jpg') }}" />
        </div>
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <div class="pull-bottom bottom-left m-b-40">
                    <h5 class="text-white no-margin">Conjunto Residencial</h5>
                    <h1 class="text-white no-margin"><span class="semi-bold">{{ $conjunto->nombre}}</span></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- END JUMBOTRON -->
    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
    <div class="feed">
    <!-- START DAY -->
    <div class="day" data-social="day">
    <!-- START ITEM -->
    <div class="card no-border bg-transparent full-width" data-social="item">
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid p-t-30 p-b-30 ">
            <div class="row">
                <div class="col-md-4">
                    <div class="container-xs-height">
                        <div class="row-xs-height">
                            <div class="social-user-profile col-xs-height text-center col-top">
                                <div class="thumbnail-wrapper d48 circular bordered b-white">
                                    <img alt="Avatar" width="55" height="55" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" src="{{ asset('build/assets/img/user.png') }}">
                                </div>
                                <br>
                                <i class="fa fa-check-circle text-success fs-16 m-t-10"></i>
                            </div>
                            <div class="col-xs-height p-l-20">
                                <h3 class="no-margin">{{ $usuario->nombres}} {{ $usuario->apellidos}}</h3>
                                <p class="no-margin fs-16">Administrador</p>
                                <p class="hint-text m-t-5 small">{{ $usuario->email}} | {{ $usuario->telefono}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="no-margin">{{ $conjunto->direccion}}</h3>
                    <p class="no-margin fs-16">{{ $conjunto->localidad }} | {{ $conjunto->barrio }}</p>

                </div>
                <div class="col-md-4">
                    <p class="m-b-5 small">40 Usuarios</p>
                    <ul class="list-unstyled ">
                        <li class="m-r-10">
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>
                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                                <img width="35" height="35" data-src-retina="{{ asset('build/assets/img/user.png') }}" data-src="{{ asset('build/assets/img/user.png') }}" alt="Profile Image" src="{{ asset('build/assets/img/user.png') }}">
                            </div>
                        </li>

                        <li>
                            <div class="thumbnail-wrapper d32 circular b-white">
                                <div class="bg-master text-center text-white"><span>+34</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <br>
                    <p class="m-t-5 small">More friends</p>
                </div>
            </div>
        </div>
        <!-- END CONTAINER FLUID -->
    </div>
    <!-- END ITEM -->


    <!-- END ITEM -->
    </div>
    <!-- END DAY -->
    </div>
    <!-- END FEED -->
    </div>
    <!-- END CONTAINER FLUID -->
    </div>
    <!-- /container -->
    </div>

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