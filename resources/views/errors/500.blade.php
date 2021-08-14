
<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 1.6.0
Purchase: https://wrapbootstrap.com/theme/beyondadmin-adminapp-angularjs-mvc-WB06R48S4
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Error 404 - Page Not Found</title>

    <meta name="description" content="Error 404 - Page Not Found" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('public/assets/beyond/assets/img/favicon.png') }}" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{ asset('public/assets/beyond/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/beyond/assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/beyond/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/beyond/assets/css/weather-icons.min.css') }}" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet" type="text/css" />

    <!--Beyond styles-->
    <link href="{{ asset('public/assets/beyond/assets/css/beyond-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/assets/beyond/assets/css/demo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/beyond/assets/css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/assets/beyond/assets/css/skins/orange.min.css') }}" rel="stylesheet" type="text/css" />

</head>
<!--Head Ends-->
<!--Body-->
<body class="body-404">
    <div class="error-header"> </div>
    <div class="container ">
        <section class="error-container text-center">
            <h1>404</h1>
            <div class="error-divider">
                <h2> عذراً </h2><br>
                <p class="description">هنالك خطأ ما</p>
            </div>
            <a href="{{ request()->root() }}" class="return-btn"><i class="fa fa-home"></i>@lang('site.home')</a>
        </section>
    </div>
    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>

    
</body>
<!--Body Ends-->
</html>
