@include('layouts.header')
<body class="hold-transition skin-blue">



        @yield('main-content')

    <!-- /.content-wrapper -->

    <!-- Main Footer -->
{{--    <footer class="center-text">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; {{date('Y')}} <a href="javascript:void(0)">Company</a>.</strong> All rights reserved.
    </footer>--}}

@include('layouts.footer')