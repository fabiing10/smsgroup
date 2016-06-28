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

    <div class="container-xs-height full-height">
        <div class="row-xs-height">
            <div class="col-xs-height col-middle">
                <div class="error-container text-center">
                    <h1 class="error-number">404</h1>
                    <h2 class="semi-bold">Sorry but we couldnt find this page</h2>
                    <p>This page you are looking for does not exsist <a href="#">Report this?</a>
                    </p>
                    <div class="error-container-innner text-center">
                        <form>
                            <div class="form-group form-group-default input-group transparent text-left">
                                <label>Search</label>
                                <input class="form-control" placeholder="Try searching the missing page" type="email"> <span class="input-group-addon pg-search"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pull-bottom sm-pull-bottom full-width">
        <div class="error-container">
            <div class="error-container-innner">
                <div class="m-b-30 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                    <div class="col-sm-3 no-padding">
                        <img alt="" class="m-t-5" data-src="assets/img/demo/pages_icon.png" data-src-retina="assets/img/demo/pages_icon_2x.png" height="60" src="assets/img/demo/pages_icon.png" width="60">
                    </div>
                    <div class="col-sm-9 no-padding">
                        <p><small>Create a pages account. If you have a facebook account, log into it for this process.
                                Sign in with <a href="#">Facebook</a> or <a href="#">Google</a></small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop