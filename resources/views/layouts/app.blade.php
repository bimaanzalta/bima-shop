<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Bima Shop @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('admin/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ url('admin/js/modernizr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('admin/fa-icons/css/font-awesome.min.css') }}">
</head>


<body>

    <!-- Begin page -->
    <div id="wrapper">

        @include('layouts.side-menu')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            @include('layouts.top-bar')
            @yield('content')
            @include('layouts.footer')

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/popper.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('admin/js/waves.js') }}"></script>
    <script src="{{ url('admin/js/jquery.slimscroll.js') }}"></script>

    <!-- Flot chart -->
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.min.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.time.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.resize.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.pie.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/curvedLines.js') }}"></script>
    <script src="{{ url('admin/plugins/flot-chart/jquery.flot.axislabels.js') }}"></script>

    <!-- KNOB JS -->
    <!--[if IE]>
        <script type="text/javascript" src="{{ url('admin/plugins/jquery-knob/excanvas.js') }}"></script>
        <![endif]-->
    <script src="{{ url('admin/plugins/jquery-knob/jquery.knob.js') }}"></script>

    <!-- Dashboard Init -->
    <script src="{{ url('admin/pages/jquery.dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('admin/js/jquery.core.js') }}"></script>
    <script src="{{ url('admin/js/jquery.app.js') }}"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

</body>

</html>
