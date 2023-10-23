<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ZOU TECH HUB</title>

    @if (!Str::contains(request()->path(), 'admin'))
        <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/site/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/site/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @endif


    @if(Str::contains(request()->path(), 'admin'))
    {{-- Start Admin css link --}}
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('asset/images/favicon.png')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/jqvmap/css/jqvmap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/chartist/css/chartist.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/vendor/summernote/summernote.css')}}" >
        <link rel="stylesheet" href="{{ asset('asset/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/css/skin-3.css')}}">
        <link rel="stylesheet" href="{{ asset('assets/js/pages/lightbox.init.js') }}">
        <link href="{{asset('asset/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    {{-- End Admin css link --}}
    @endif

    @vite('resources/css/app.css')
</head>
<body>
    <main id="app">

    </main>
    @vite('resources/js/app.js')

    @if (!Str::contains(request()->path(), 'admin'))
        {{-- <script src="{{ asset('assets/site/js/bootstrap.min.js') }}"></script> --}}
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
        {{-- <script src="{{ asset('assets/site/js/owl.carousel.min.js') }}"></script> --}}
        {{-- <script src="{{ asset('assets/site/js/main.js') }}"></script> --}}
        {{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}

        <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    @endif


    @if (Str::contains(request()->path(), 'admin'))
    {{-- Start Admin js link --}}

        <script src="{{ asset('asset/vendor/global/global.min.js')}}"></script>
        <script src="{{ asset('asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
        <script src="{{ asset('asset/js/custom.min.js')}}"></script>
        <script src="{{ asset('asset/js/dlabnav-init.js')}}"></script>

        <script src="{{ asset('asset/vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins-init/sparkline-init.js')}}"></script>
        <script src="{{ asset('asset/vendor/raphael/raphael.min.js')}}"></script>
        <script src="{{ asset('asset/vendor/morris/morris.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins-init/widgets-script-init.js')}}"></script>
        <script src="{{ asset('asset/js/dashboard/dashboard.js')}}"></script>
        <script src="{{ asset('asset/vendor/summernote/js/summernote.min.js')}}"></script>
        <script src="{{ asset('asset/js/plugins-init/summernote-init.js')}}"></script>

        <script src="{{ asset('asset/vendor/svganimation/vivus.min.js')}}"></script>
        <script src="{{ asset('asset/vendor/svganimation/svg.animation.js')}}"></script>
        <script src="{{ asset('asset/js/styleSwitcher.js')}}"></script>

        <script src="{{ asset('asset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('asset/js/plugins-init/datatables.init.js') }}"></script>
    @endif
</body>
</html>
