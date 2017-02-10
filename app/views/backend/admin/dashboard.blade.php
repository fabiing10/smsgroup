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
    .widget {
        position: relative;
        width: 30%;
        float: left;
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
                                <div class="col-lg-7 col-md-6 col-md-height col-middle bg-usuarios">
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
                                            <div class="panel-title">Bienvenido(a) {{ Auth::user()->nombres }}
                                            </div>
                                        </div>
                                        <div class="panel-body">
                                            <h3>Plataforma de Administracion</h3>
                                            <p></p>
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
                <ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2">
                <li class="widget">
                      <div class="cover overlay overlay-hover">

                        <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align" style="
          background: rgba(244, 67, 54, 0.89);
          ">
                          <div class="vertical-align-middle">
                            <h3 class="widget-title margin-bottom-20">Conjuntos</h3>
                            <div class="widget-time ">
                              <img src="{{ asset('uploads/banners/documentos.png') }}" alt="..." style="width: 98px;">
                            </div>
                            <a href="admin/conjuntos" class="btn btn-outline btn-inverse">Ingresar</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="widget">
                      <div class="cover overlay overlay-hover">

                        <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align" style="
          background: rgba(96, 125, 139, 0.89);
          ">
                          <div class="vertical-align-middle">
                            <h3 class="widget-title margin-bottom-20">Administradores</h3>
                            <div class="widget-time">
                            <img src="{{ asset('uploads/banners/administradores.png') }}" alt="..." style="width: 84px;">
                            <br> <br>
                            </div>
                            <a href="admin/administradores" class="btn btn-outline btn-inverse">Ingresar</a>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="widget">
                      <div class="cover overlay overlay-hover">

                        <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align" style="
          background: rgba(236, 119, 28, 0.96);
          ">
                          <div class="vertical-align-middle">
                            <h3 class="widget-title margin-bottom-20">Publicidad</h3>
                            <div class="widget-time">
                            <img src="{{ asset('uploads/banners/noticias.png') }}" alt="..." style="width: 84px;">
                            <br> <br>
                            </div>
                            <a href="admin/publicidad" class="btn btn-outline btn-inverse">Ingresar</a>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
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
                    <span class="font-montserrat">SMS Group</span>.
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
