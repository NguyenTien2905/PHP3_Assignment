<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:33:02 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc."/>
        <meta name="author" content="Zoyothemes"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/adminimages/favicon.ico">

        <!-- App css -->
        <link href="/assets/admin/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons -->
        <link href="/assets/admin/css/icons.min.css" rel="stylesheet" type="text/css" />

        @yield('css')

    </head>

    <!-- body start -->
    <body data-menu-color="light" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">


            <!-- Topbar Start -->
            @include('admins.layouts.parials.header')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            @include('admins.layouts.parials.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                
                @yield('content')
                <!-- Footer Start -->
                @include('admins.layouts.parials.footer')
                <!-- end Footer -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Vendor -->
        <script src="/assets/admin/libs/jquery/jquery.min.js"></script>
        <script src="/assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/assets/admin/libs/simplebar/simplebar.min.js"></script>
        <script src="/assets/admin/libs/node-waves/waves.min.js"></script>
        <script src="/assets/admin/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="/assets/admin/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="/assets/admin/libs/feather-icons/feather.min.js"></script>

        <!-- Apexcharts JS -->
        <script src="/assets/admin/libs/apexcharts/apexcharts.min.js"></script>

        <!-- for basic area chart -->
        <script src="../../../apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- Widgets Init Js -->
        <script src="/assets/admin/js/pages/analytics-dashboard.init.js"></script>

        <!-- App js-->
        <script src="/assets/admin/js/app.js"></script>

        @yield('js')

    </body>

<!-- Mirrored from zoyothemes.com/tapeli/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jul 2024 08:34:03 GMT -->
</html>