<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>@yield('title') | {{ env('APP_NAME') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('/assets/images/favicon.png') }}">
        @yield('css-upper')
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/icons.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
        @yield('css')
        @yield('script-head')
    </head>

    <body class="fixed-left">
        <div id="wrapper">
            {{-- SIDEBAR --}}
            @include('_template_management.sidebar')

            {{-- CONTENT --}}
            <div class="content-page">
                <div class="content">
                    {{-- NAVBAR --}}
                    @include('_template_management.navbar')

                    {{-- MAIN CONTENT --}}
                    @yield('content')
                </div>

                <footer class="footer fw-700">© <?= date('Y') ?> {{ env('APP_NAME') }}.</footer>
            </div>
            {{-- END CONTENT --}}
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('/assets/js/app.js') }}"></script>
        @yield('script')
    </body>
</html>