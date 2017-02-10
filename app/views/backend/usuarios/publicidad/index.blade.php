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

@section('css')

<link href="{{ asset('build/assets/plugins/jquery-metrojs/MetroJs.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('build/assets/plugins/codrops-dialogFx/dialog.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('build/assets/plugins/codrops-dialogFx/dialog-sandra.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('build/assets/plugins/owl-carousel/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="screen" />
<link href="{{ asset('build/assets/plugins/jquery-nouislider/jquery.nouislider.css') }}" rel="stylesheet" type="text/css" media="screen" />

<style>

    .social-wrapper .social .jumbotron {
        height: 35vh;
    }

    .table thead tr th, .table tbody tr td {
        text-align: center;
    }

    div#img {
        background-repeat: no-repeat;
        background-size: cover;
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
                        <img alt="Cover photo" src="{{ asset('uploads/banners/anuncios.png') }}" />
                    </div>
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <div class="pull-bottom bottom-left m-b-40">
                                <h5 class="text-white no-margin">Conjunto Residencial</h5>
                                <h1 class="text-white no-margin"><span class="semi-bold">Publicidad</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END JUMBOTRON -->
                <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">

                    <div class="gallery">
                        <!-- START GALLERY ITEM -->

                        @foreach($publicidades as $publicidad)
                        <div class="gallery-item" data-width="1" data-height="1" onclick="loadPublicity({{$publicidad->id}})">
                            <!-- START PREVIEW -->
                            <img src="/uploads/publicidad/{{$publicidad->img_publicidad}}" alt="" class="image-responsive-height">
                            <!-- END PREVIEW -->
                            <!-- START ITEM OVERLAY DESCRIPTION -->
                            <div class="overlayer bottom-left full-width">
                                <div class="overlayer-wrapper item-info ">
                                    <div class="gradient-grey p-l-20 p-r-20 p-t-20 p-b-5">
                                        <div class="">
                                            <p class="pull-left bold text-white fs-14 p-t-10">{{ $publicidad->titulo }}</p>
                                            <h5 class="pull-right semi-bold text-white font-montserrat bold">${{$publicidad->valor}}</h5>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="m-t-10">

                                            <div class="inline m-l-10">
                                                <p class="no-margin text-white fs-12">Publicidad - SMS  Group</p>

                                            </div>
                                            <div class="pull-right m-t-10">
                                                <button class="btn btn-white btn-xs btn-mini bold fs-14" type="button">+</button>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PRODUCT OVERLAY DESCRIPTION -->
                        </div>

                        @endforeach

                        <!-- END GALLERY ITEM -->
                        <!-- START GALLERY ITEM -->





                    </div>

                </div>
                <!-- END CONTAINER FLUID -->
            </div>
            <!-- /container -->
        </div>

    </div>



    @include('backend.usuarios.publicidad.detalles')


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

<script src="{{ asset('build/assets/plugins/jquery-metrojs/MetroJs.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/codrops-dialogFx/dialogFx.js') }}"></script>
<script src="{{ asset('build/assets/plugins/owl-carousel/owl.carousel.min.js') }}"></script>


@stop

@section('specific_js')
<script src="{{ asset('build/assets/js/gallery.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/pages/js/pages.social.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/js/script/publicidad.js') }}" type="text/javascript"></script>
@stop
