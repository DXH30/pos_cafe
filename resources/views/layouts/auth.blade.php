<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{env('APP_NAME')}} | {{$title}}</title>

        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
        <link href="{{asset('css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen   animated fadeInDown">
            @yield('content')

        </div>

        <!-- Mainly scripts -->
        <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('js/popper.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.js')}}"></script>
        <!-- iCheck -->
        <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
        @yield('scripts')
    </body>
</html>
