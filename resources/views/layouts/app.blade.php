<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Muslim Soul</title>
    {{-- <link rel="icon" href="{{ asset('dist/img/quickfix-faveicon.png') }}" type="image/x-icon" /> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}">
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('dist/tabler-icons/tabler-icons.min.css') }}">
    {{-- <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script> --}}
    <script src="{{ asset('dist/js/jquery-3.6.3.min.js') }}"></script>
    @stack('css')

    <style>
        @font-face {
            font-family: 'Al Majeed Quranic';
            url: url({{ asset('frontend/font/Al Majeed Quranic Font_shiped.ttf') }}),
        }
    </style>
</head>

<body>
    <div class="page">
        <!-- Navbar -->
        @include('layouts.inc.nav')
        @include('layouts.inc.aside')
        <div class="page-wrapper">
            <!-- Page header -->
            @yield('header')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row row-deck row-cards">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.inc.footer')
        </div>
    </div>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    @stack('js')
</body>

</html>
