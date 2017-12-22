<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}">

    <!-- form Uploads -->
    <link href="{{ asset('plugins/fileuploads/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App title -->
    <title>Los postes</title>

    <!-- Editatable  Css-->
    <link rel="stylesheet" href="{{ asset('plugins/magnific-popup/dist/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/jquery-datatables-editable/datatables.css') }}" />

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

    <!-- Custom box css -->
    <link href="{{ asset('plugins/custombox/dist/custombox.min.css') }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset('plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Plugins css-->
    <link href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/multiselect/css/multi-select.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/select2/dist/css/select2-bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- App css -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/fondo_edit.css') }}">
    @yield('styles')

    <script src="{{ asset('js/modernizr.min.js') }}"></script>

</head>

<body class="fixed-left">
<!-- Begin page -->
<div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="" class="logo"><img src="{{ asset('images/LogoInicial.png')}}" width="184" height="50" ></a>
        </div>
        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Page title -->
                <ul class="nav navbar-nav navbar-left">

                    <li>
                        <h6 class="page-title">
                            @yield('page-title', 'Bienvenido')
                        </h6>
                    </li>

                </ul>
            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!-- User -->
            <div class="user-box">
                    <div class="user-img">
                        <img src="{{ asset('images/users/admin.jpg') }}" alt="user-img" title="{{ auth()->user()->name }}" class="img-circle img-thumbnail img-responsive">
                    </div>
                <h5><a href="">{{ auth()->user()->name }}</a></h5>
                <h6>{{ auth()->user()->role_name }}</h6>
                <ul class="list-inline">
                    <li>
                        <a href="" title="Perfil">
                            <i class="zmdi zmdi-settings"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" title="Cerrar sesión">
                            <i class="zmdi zmdi-power"></i>
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            <!-- End User -->

            <!--- Sidemenu -->
        @include('includes.menu')
        <!-- Sidebar -->
            <div class="clearfix"></div>

        </div>
    </div>

    @yield('content')

</div>

<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/detect.js') }}"></script>
<script src="{{ asset('js/fastclick.js') }}"></script>
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('js/waves.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

<!-- Plugins Js -->
<script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/multiselect/js/jquery.multi-select.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-quicksearch/jquery.quicksearch.js') }}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('plugins/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') }}" type="text/javascript"></script>

<!-- Datatables-->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.scroller.min.js') }}"></script>

<!-- file uploads js -->
<script src="{{ asset('plugins/fileuploads/js/dropify.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('pages/datatables.init.js') }}"></script>

<!-- Editable js -->
<script src="{{ asset('plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-datatables-editable/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('plugins/tiny-editable/mindmup-editabletable.js') }}"></script>
<script src="{{ asset('plugins/tiny-editable/numeric-input-example.js') }}"></script>
<!-- init -->
<script src="{{ asset('pages/datatables.editable.init.js') }}"></script>


<!-- <script type="text/javascript" src="{{ asset('plugins/jquery-knob/excanvas.js') }}"></script>-->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
<script src="{{ asset('plugins/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('pages/jquery.morris.init.js') }}"></script>

<!-- Dashboard init-->
<!-- <script src="{{ asset('pages/jquery.dashboard.js') }}"></script> -->

<!-- Modal-Effect -->
<script src="{{ asset('plugins/custombox/dist/custombox.min.js') }}"></script>
<script src="{{ asset('plugins/custombox/dist/legacy.min.js') }}"></script>


<!-- App js -->
<script src="{{ asset('js/jquery.core.js') }}"></script>
<script src="{{ asset('js/jquery.app.js') }}"></script>

<!-- Upload image profile -->
<script type="text/javascript" src="{{ asset('js/image-profile.js') }}"></script>

@yield('scripts')
</body>
</html>