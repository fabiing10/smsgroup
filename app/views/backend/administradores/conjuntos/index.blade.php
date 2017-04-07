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
                    <h5 class="text-white no-margin">Conjunto Industrial</h5>
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

    <div class="row">
      <ul class="blocks no-space blocks-100 blocks-xlg-3 blocks-md-2">
      <li class="widget">
            <div class="cover overlay overlay-hover">

              <div class="overlay-panel overlay-fade overlay-background overlay-background-fixed text-center vertical-align" style="
background: rgba(244, 67, 54, 0.89);
">
                <div class="vertical-align-middle">
                  <h3 class="widget-title margin-bottom-20">Mensajeria</h3>
                  <div class="widget-time ">
                    <img src="{{ asset('uploads/banners/mensajeria.png') }}" alt="..." style="width: 98px;">
                  </div>
                  <a href="admin-conjuntos/conjunto/mensajes" class="btn btn-outline btn-inverse">Ingresar</a>
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
                  <h3 class="widget-title margin-bottom-20">Noticias</h3>
                  <div class="widget-time">
                  <img src="{{ asset('uploads/banners/noticias.png') }}" alt="..." style="width: 84px;">
                  <br> <br>
                  </div>
                  <a href="admin-conjuntos/conjunto/anuncios" class="btn btn-outline btn-inverse">Ingresar</a>
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
                  <h3 class="widget-title margin-bottom-20">Documentos</h3>
                  <div class="widget-time">
                  <img src="{{ asset('uploads/banners/documentos.png') }}" alt="..." style="width: 84px;">
                  <br> <br>
                  </div>
                  <a href="admin-conjuntos/conjunto/documentos" class="btn btn-outline btn-inverse">Ingresar</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
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
