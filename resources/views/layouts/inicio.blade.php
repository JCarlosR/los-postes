<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon1.ico')}}">

    <!-- App title -->
    <title>Los postes</title>

    <!-- App CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/core.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/components.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}"></script>
    <![endif]-->

    <script src="{{ asset('js/modernizr.min.js') }}"></script>

</head>
<body>
<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <img src="{{ asset('images/LogoInicial.png') }}" width="368" height="100" >
    </div>
        @yield('content')
</div>
<!-- end wrapper page -->




<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/detect.js') }}"></script>
<script src="{{ asset('js/fastclick.js') }}'"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}'"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/wow.min.js') }}'"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}'"></script>

<!-- App js -->
<script src="{{ asset('js/jquery.core.js') }}"></script>
<script src="{{ asset('js/jquery.app.js') }}"></script>

</body>


</html>