<!DOCTYPE html>
<html>
<head>

    @yield('meta')

    <link href="{{ asset('build/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('build/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('build/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet') }}" type="text/css" />
    <link href="{{ asset('build/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet') }}" type="text/css" media="screen" />
    <link href="{{ asset('build/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet') }}" type="text/css" media="screen" />
    <link href="{{ asset('build/assets/plugins/switchery/css/switchery.min.css" rel="stylesheet') }}" type="text/css" media="screen" />
    <link href="{{ asset('build/pages/css/pages-icons.css" rel="stylesheet') }}" type="text/css">
    <link class="main-stylesheet" href="{{ asset('build/pages/css/pages.css" rel="stylesheet') }}" type="text/css" />
    <!--[if lte IE 9]>
    <link href="{{ asset('build/pages/css/ie9.css') }}" rel="stylesheet" type="text/css" />
    <![endif]-->
    <script type="text/javascript">
        window.onload = function()
        {
            // fix for windows 8
            if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header   ">
<!-- START PAGE-CONTAINER -->

@yield('content_login')


<!-- END PAGE CONTAINER -->
<!-- BEGIN VENDOR JS -->
<script src="{{ asset('build/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/boostrapv3/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-bez/jquery.bez.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
<script src="{{ asset('build/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/plugins/bootstrap-select2/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('build/assets/plugins/classie/classie.js') }}"></script>
<script src="{{ asset('build/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('build/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<!-- END VENDOR JS -->
<!-- BEGIN CORE TEMPLATE JS -->
<script src="{{ asset('build/pages/js/pages.min.js') }}"></script>
<!-- END CORE TEMPLATE JS -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="{{ asset('build/assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS -->
<script>
    $(function()
    {
        $('#form-login').validate()
    })
</script>
</body>
</html>