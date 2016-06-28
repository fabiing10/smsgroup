<!-- BEGIN SIDEBPANEL-->
<nav class="page-sidebar" data-pages="sidebar">
    <!-- BEGIN SIDEBAR MENU TOP TRAY CONTENT-->

    <!-- BEGIN SIDEBAR MENU HEADER-->
    <div class="sidebar-header">
        <img src="{{ asset('build/assets/img/logo_login.png') }}" alt="logo" class="brand border-radius" data-src="{{ asset('build/assets/img/logo_login.png') }}" data-src-retina="{{ asset('build/assets/img/logo_login.png') }}" width="45" height="40">
        <div class="sidebar-header-controls">
            <button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
            </button>
            <button type="button" class="btn btn-link visible-lg-inline" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
            </button>
        </div>
    </div>
    <!-- END SIDEBAR MENU HEADER-->
    <!-- START SIDEBAR MENU -->
    <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
            <li>
                {{ HTML::linkRoute('HomeAdmin', 'Inicio') }}
                <span class="icon-thumbnail"><i class="fa fa-building"></i></span>
            </li>
            <li class="">
                <a href="javascript:;"><span class="title">Conjunto</span>
                    <span class="arrow"></span></a>
                <span class="icon-thumbnail"><i class="fa fa-folder-open"></i></span>
                <ul class="sub-menu">
                    <li>
                        {{ HTML::linkRoute('zonaIndex', 'Unidades') }}
                        <span class="icon-thumbnail"><i class="fa fa-building"></i></span>
                    </li>
                    <li>
                        {{ HTML::linkRoute('apartamentoIndex', 'Apartamentos') }}
                        <span class="icon-thumbnail"><i class="fa fa-building"></i></span>
                    </li>

                </ul>
            </li>


            <li class="">
                {{ HTML::linkRoute('usuarioIndex', 'Usuarios') }}
                <span class="icon-thumbnail"><i class="fa fa-pie-chart"></i></span>
            </li>

            <li class="">
                {{ HTML::linkRoute('adminIndex', 'Mensajes') }}
                <span class="icon-thumbnail"><i class="fa fa-pie-chart"></i></span>
            </li>

            <li class="">
                {{ HTML::linkRoute('AnuncioadminIndex', 'Noticias') }}
                <span class="icon-thumbnail"><i class="fa fa-pie-chart"></i></span>
            </li>

        </ul>
        <div class="clearfix"></div>
    </div>
    <!-- END SIDEBAR MENU -->
</nav>
<!-- END SIDEBAR -->
