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

<style>

    .anuncio-btn{
        margin: 0 auto;
        display: -webkit-box;
        border-radius: 5px !important;
        width: 70%;
        margin-top: 23px;
    }

    #img-profile{
        width: 50%;
        margin: 0 auto;
        display: block;
        margin-bottom: 30px;
    }
    .card.share.col1 {
        margin-right: 16px;
    }

    .social-wrapper .social .jumbotron {
        height: 35vh;
    }

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
                        <img alt="Cover photo" src="{{ asset('uploads/banners/anuncio_banner.png') }}" />
                    </div>
                    <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                        <div class="inner">
                            <div class="pull-bottom bottom-left m-b-40">
                                <h5 class="text-white no-margin">Conjunto Residencial</h5>
                                <h1 class="text-white no-margin"><span class="semi-bold">Anuncios</span></h1>
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

                            <!-- END ITEM -->


                            @include('backend.usuarios.anuncios.listar')

                            @include('backend.usuarios.anuncios.anuncio')

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

<script src="{{ asset('build/assets/plugins/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/classie/classie.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/codrops-stepsform/js/stepsForm.js') }}" type="text/javascript"></script>
<!--[if lte IE 9]>
<script src="{{ asset('build/assets/plugins/jquery-isotope/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-isotope/masonry-horizontal.js') }}" type="text/javascript"></script>
<![endif]-->


@stop

@section('specific_js')
<script src="{{ asset('build/pages/js/pages.social.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/js/script/anuncios.js') }}" type="text/javascript"></script>
@stop