<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Desa Tamiajeng</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    @include('layouts.partials.favicons')
    <meta name="theme-color" content="#ffffff" />
    <script src="{{ asset('/assets/js/config.js') }}"></script>
    <script src="{{ asset('/vendors/overlayscrollbars/OverlayScrollbars.min.js') }}"></script>

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet" />
    <link href="{{ asset('/vendors/overlayscrollbars/OverlayScrollbars.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css" />
    @yield('add-css')

    <link href="{{ asset('/assets/css/theme-rtl.min.css') }}" rel="stylesheet" id="style-rtl" />
    <link href="{{ asset('/assets/css/theme.min.css') }}" rel="stylesheet" id="style-default" />
    <link href="{{ asset('vendors/glightbox/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/vendors/simple-datatables/style.css') }}" rel="stylesheet" id="style-default" />
    <link href="{{ asset('/assets/css/user-rtl.min.css') }}" rel="stylesheet" id="user-style-rtl" />
    <link href="{{ asset('/assets/css/user.min.css') }}" rel="stylesheet" id="user-style-default" />
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />

    @include('layouts.partials.scr.rtl')
</head>

<body>

    <main class="main " id="top">
        <div class="container-fluid" data-layout="container">
         

            {{-- Sidebar --}}
            @include('admin.layouts.sidebar')
            <div class="content">
                {{-- navbar --}}
                @include('admin.layouts.navbar')

                {{-- content inti --}}
                @yield('content')


                {{-- footer --}}
                @include('admin.layouts.footer')
            </div>

        </div>
    </main>




    {{-- btn customize web --}}
    @include('layouts.partials.customize')



    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/vendors/anchorjs/anchor.min.js') }}"></script>
    <script src="{{ asset('vendors/glightbox/glightbox.min.js') }}"></script>
    <script src="{{ asset('/vendors/is/is.min.js') }}"></script>
    @yield('add-js')
    <script src="{{ asset('/vendors/simple-datatables/simple-datatables.js') }}"></script>
    @yield('js table')
    <script src="{{ asset('vendors/countup/countUp.umd.js') }}"></script>
    <script src="{{ asset('/vendors/fontawesome/all.min.js') }}"></script>
    <script src="{{ asset('/vendors/lodash/lodash.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('/vendors/list.js/list.min.js') }}"></script>
    <script src="{{ asset('/assets/js/theme.js') }}"></script>
</body>

</html>
