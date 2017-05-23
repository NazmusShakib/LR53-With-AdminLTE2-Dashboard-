<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/dist/js/app.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
@yield('js')
<script>
    $(document).ready(function () {
        var n = $(".alert").css("display");
        //console.log(n);
        if(n != 'none') {
            $(".alert").fadeTo(5000, 500).slideUp(500, function() {
                $(".alert").slideUp(500);
            });
        } else {

        }
    })
</script>

</body>
</html>
