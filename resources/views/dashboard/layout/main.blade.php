<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>CRM | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Sweet Alert css-->
    <link href="libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="css/custom.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
    @include('partial.appbar')
    @include('partial.sidebar')

    @yield('main')


    <!-- JAVASCRIPT -->
    <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="libs/simplebar/simplebar.min.js"></script>
    <script src="libs/node-waves/waves.min.js"></script>
    <script src="libs/feather-icons/feather.min.js"></script>
    <script src="js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="libs/jsvectormap/maps/world-merc.js"></script>

    <!-- Dashboard init -->
    <script src="js/pages/dashboard-analytics.init.js"></script>

    <!-- App js -->
    <script src="js/app.js"></script>

    <!-- list.js min js -->
    <script src="libs/list.js/list.min.js"></script>

    <!--list pagination js-->
    <script src="libs/list.pagination.js/list.pagination.min.js"></script>

    <!-- titcket init js -->
    <script src="js/pages/ticketlist.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="libs/sweetalert2/sweetalert2.min.js"></script>

</body>

</html>
