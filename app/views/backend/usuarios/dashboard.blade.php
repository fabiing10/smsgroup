@extends('backend.layout.dashboard')

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
                                        <img  src="{{ asset('build/assets/img/logo.jpg') }}" alt="" width="150">
                                    </div>
                                </div>
                                <!-- END PANEL -->
                            </div>
                            <div class="col-lg-5 col-md-height col-md-6 col-top">
                                <!-- START PANEL -->
                                <div class="panel panel-transparent">
                                    <div class="panel-heading">
                                        <div class="panel-title">Bienvenido(a) {{ Auth::user()->nombres }}
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <h3>Comunicando - WebApp</h3>
                                        <p>Breaking convention again, we have inctroduced a notification system which variates based on the type and level of importance of the message. Thanks to this, an alert by the side of your screen would easily catch your attention.</p>
                                        <br>

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
        <!-- START CONTAINER FLUID -->
        <div class="container-fluid container-fixed-lg">
            <div class="row">

                <div class="col-sm-3">
                    <!-- START PANEL -->
                    <div id="portlet-linear" class="panel panel-default">
                        <div class="panel-heading ">
                            <div class="panel-title">Usuarios
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <span class="semi-bold">50</span></h3>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>

                <div class="col-sm-3">
                    <!-- START PANEL -->
                    <div id="portlet-linear" class="panel panel-default">
                        <div class="panel-heading ">
                            <div class="panel-title">Zonas
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <span class="semi-bold">15</span> </h3>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
                <div class="col-sm-3">
                    <!-- START PANEL -->
                    <div id="portlet-linear" class="panel panel-default">
                        <div class="panel-heading ">
                            <div class="panel-title">Apartamentos
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <span class="semi-bold">250</span> </h3>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
                <div class="col-sm-3">
                    <!-- START PANEL -->
                    <div id="portlet-linear" class="panel panel-default">
                        <div class="panel-heading ">
                            <div class="panel-title">Mensajes
                            </div>
                            <div class="panel-controls">
                                <ul>
                                    <li><a href="#" class="portlet-collapse" data-toggle="collapse"><i class="portlet-icon portlet-icon-collapse"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-refresh" data-toggle="refresh"><i class="portlet-icon portlet-icon-refresh"></i></a>
                                    </li>
                                    <li><a href="#" class="portlet-close" data-toggle="close"><i class="portlet-icon portlet-icon-close"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h3>
                                <span class="semi-bold">20</span></h3>
                        </div>
                    </div>
                    <!-- END PANEL -->
                </div>
            </div>
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
                <span class="font-montserrat">Comunicando</span>.
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

@stop


@section('specific_js')
<script src="{{ asset('build/assets/js/portlets.js') }}" type="text/javascript"></script>
@stop
