@extends('backend.layout.login')

@section('meta')
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Login - Comentando</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="apple-touch-icon" href="pages/ico/60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
    <link rel="icon') }}" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
@stop



@section('content_login')

<div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
        <!-- START Background Pic-->
        <img src="{{ asset('build/assets/img/bg-app.jpg') }}" data-src="{{ asset('build/assets/img/bg-app.jpg') }}" data-src-retina="assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" alt="" class="lazy">
        <!-- END Background Pic-->
        <!-- START Background Caption-->
        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">
                Conectate y administra todo en una sola plataforma</h2>
            <p class="small">

            </p>
        </div>
        <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <img src="{{ asset('build/assets/img/logo_login.png') }}" alt="logo" data-src="{{ asset('build/assets/img/logo_login.png') }}" data-src-retina="assets/img/logo_login.png') }}" class="logo-ico" style="width: 45%;">
            <p class="p-t-35">Ingrese sus datos de acceso</p>
            <!-- START Login Form -->
            <form id="form-login" class="p-t-15" role="form" method="post" action="login">
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>Usuario</label>
                    <div class="controls">
                        <input type="text" name="username" placeholder="Usuario" class="form-control" required>
                    </div>
                </div>
                <!-- END Form Control-->
                <!-- START Form Control-->
                <div class="form-group form-group-default">
                    <label>Clave</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="password" placeholder="Clave" required>
                    </div>
                </div>
                <!-- START Form Control-->
                <div class="row">
                    <div class="col-md-6 no-padding">
                        <div class="checkbox ">
                            <input type="checkbox" value="1" id="checkbox1">
                            <label for="checkbox1">Recordarme</label>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="#" class="text-info small">Necesita ayuda?</a>
                    </div>
                </div>
                <!-- END Form Control-->
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Ingresar</button>
            </form>
            <!--END Login Form-->
            <div class="pull-bottom sm-pull-bottom">
                <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">

                    <div class="col-sm-9 no-padding m-t-10">
                        <p><small>
                                Antes de crear su cuenta, porfavor lea la politica y privacidad de SMS Group en el siguiente link <a href="#" class="text-info">Politica</a> & <a href="#" class="text-info">Privacidad</a></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Login Right Container-->
</div>

@stop