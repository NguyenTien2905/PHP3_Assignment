<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="/client/site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/client/assets/img/favicon.ico">

    <!-- CSS here -->
    @include('clients.layouts.partials.css')
</head>

<body>

    <!-- Preloader Start -->
    @include('clients.layouts.partials.preloader')
    <!-- Preloader Start -->

    <header>
        <div class="header-area">
            <div class="main-header ">
                @include('clients.layouts.partials.headers.top')

                @include('clients.layouts.partials.headers.mid')

                @include('clients.layouts.partials.headers.bottom')
            </div>
        </div>
    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        <!-- Footer Start-->
        @include('clients.layouts.partials.footer.area')
        <!-- footer-bottom aera -->
        @include('clients.layouts.partials.footer.bottom')
        <!-- Footer End-->
    </footer>

    <!-- JS here -->
    @include('clients.layouts.partials.js')

</body>

</html>
