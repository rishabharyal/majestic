<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ $title ?? 'Majestic Cleaning Admin' }}</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ asset('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style> 
        #toast-container { 
            margin-top: 10px !important; 
        } 
    </style>
    
    @yield("css")
</head>

<body>
    <div id="wrapper">
        @include('admin.layouts.sidebar')
        <div id="page-wrapper" class="gray-bg dashbard-1">
            @include('admin.layouts.navbar')
            <div class="wrapper wrapper-content animated fadeInRight">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="/js/inspinia.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>

    <!-- Toastr -->
    <script src="{{ asset('/js/plugins/toastr/toastr.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            toastr.options = {
                "positionClass" : "toast-top-center",
                "closeButton" : true,
                "debug" : false,
                "newestOnTop" : true,
                "progressBar" : true,
                "preventDuplicates" : false,
                "onclick" : null,
                "showDuration" : "300",
                "hideDuration" : "1000",
                "timeOut" : "5000",
                "extendedTimeOut" : "1000",
                "showEasing" : "swing",
                "hideEasing" : "linear",
                "showMethod" : "fadeIn",
                "hideMethod" : "fadeOut"
            }

            @if(Session::has('success'))
                toastr['success']("{{ Session::get('success') }}")
            @endif
            @if(Session::has('warning'))
                toastr['warning']("{{ Session::get('warning') }}")
            @endif
            @if(Session::has('error'))
                toastr['error']("{{ Session::get('error') }}")
            @endif
        });
    </script>   

    @yield('scripts')
</body>

</html>