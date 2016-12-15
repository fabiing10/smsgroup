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
    .table thead tr th, .table tbody tr td {
        text-align: center;
    }
    a{ color: #000; }
a:link, a:visited{ text-decoration: none; }
a:hover, a:active{ text-decoration: none; }
a img{ border: none; }


/* Layout */
.boundingBox{ margin: 0 auto; width: 916px; }

/* Content */

#content{ padding: 20px 0; }

/* Content - Portfolio Listing */

ul#portfolio-filter{ margin: -20px 0; padding: 0; height: 64px; padding-left: 70px; line-height: 64px; }
ul#portfolio-filter li{ display: inline; }
ul#portfolio-filter a{ margin-right: 0.5em; padding: 0.5em 1em; background: #FFF; color: #AAA; font-weight: bold; text-decoration: none; }
ul#portfolio-filter a:hover, ul#portfolio-filter a.current{ color: #888; }
ul#portfolio-filter a.current{ background-color: #DDD; }

ul#portfolio-list{ margin: 36px 0 0 0; padding: 0; list-style: none; }
ul#portfolio-list li{ width: 165px; height: 160px; display: block; float: left; margin-right: 18px; overflow: hidden; }
ul#portfolio-list li a{ display: block; width: 163px; height: 120px; overflow: hidden; border: 1px solid #CDCDCD; background: #eee; }

ul#portfolio-list li p {
    font-size: 13px;
    line-height: 18px;
    color: #4a4a4a;
    margin: 5px 0;
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
            <img alt="Cover photo" src="{{ asset('uploads/banners/documentos.jpg') }}" />
        </div>
        <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
            <div class="inner">
                <div class="pull-bottom bottom-left m-b-40">
                    <h5 class="text-white no-margin">Seccion</h5>
                    <h1 class="text-white no-margin"><span class="semi-bold">Documentos</span></h1>

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
              <ul id="portfolio-filter">
              			<li><a href="#all" rel="all">Todos</a></li>
              			<li><a href="#acta-asamblea" title="" rel="acta-asamblea">Actas de Asambleas</a></li>
              			<li><a href="#informes-contables" title="" rel="informes-contables">Informes Contables</a></li>
              			<li><a href="#manual-convivencia" title="" rel="manual-convivencia">Manual de convivencia</a></li>
                    <li><a href="#procesos-procedimientos" title="" rel="procesos-procedimientos">Procesos & Procedimientos</a></li>
              </ul>

              		<ul id="portfolio-list">
                      @foreach($documentos as $document)
                        <li style="display: block;" class="{{ $document->categoria }}">
              						<a href="/uploads/documents/{{ $document->url }}" title="" target="_blank"><img src="/uploads/pdf.png" alt=""></a>
                  				<p style="text-align:center;">
                  					{{ $document->nombre }} <br>{{ $document->fecha }}
                  				</p>
                  			</li>
                        @endforeach
              		</ul>
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
<script type="text/javascript" src="{{ asset('build/assets/js/filterable.pack.js') }}"></script>

@stop

@section('specific_js')
<script src="{{ asset('build/assets/js/init_a.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/js/datatables.js') }}" type="text/javascript"></script>
@stop
