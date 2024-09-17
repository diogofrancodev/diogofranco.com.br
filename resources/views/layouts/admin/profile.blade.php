<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HGAC') }}</title>

    @laravelPWA

    <!-- Custom fonts for this template-->
    <link href="" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        @livewireStyles
{{--    <script src="{{ url(mix('js/app.js')) }}"></script>--}}
    <!-- Custom styles for this template-->
    <link href="{{ url(mix('css/admin.css')) }}" rel="stylesheet">
    {{-- Vendor Styles --}}
        @yield('css-style')
    {{-- Theme Styles --}}
</head>
    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
                @component('components.admin.sidebar')

                @endcomponent

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                @component('components.admin.navbar')

                @endcomponent

            <!-- Main Content -->
            <div id="content">
                <div class="col-auto">
                    @include('flash::message')
                </div>
                @yield('content')
            </div>
</div>
</div>

        </div>
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scripts -->
    @livewireScripts
    <script src="{{ url(mix('js/admin.js')) }}" defer></script>
    {{-- JS Script --}}
    @yield('js-script')
    {{-- JS Script --}}
    </body>
</html>
