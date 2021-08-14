<!DOCTYPE html>
<html lang="en">
<head>
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>منصة العمل الحر السوداني</title>
    <!-- Bootstrap Core CSS -->
    <!-- Global CSS -->
    @if(Session::get('lang') == 'en') 
		<link rel="stylesheet" href="{{ asset('public/assets/userAccount/css/bootstrap.css') }}">   
		<link href="{{ asset('public/assets/userAccount/css/sb-admin-ar.css') }}" rel="stylesheet">
	@else
		<link rel="stylesheet" href="{{ asset('public/assets/userAccount/css/bootstrap-ar.css') }}">   
		<link href="{{ asset('public/assets/userAccount/css/sb-admin-2ar.css') }}" rel="stylesheet">
	@endif
    <link rel="stylesheet" href="{{ asset('public/assets/userAccount/plugins/font-awesome/css/font-awesome.css') }}">
	<!-- Optional theme -->
	<link rel="stylesheet" href="{{ asset('public/assets/userAccount/css/bootstrap-theme.min.css') }}">
    <!-- Custom CSS -->
@yield('css')
    <link href="{{ asset('public/assets/userAccount/uploadify/uploadify.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

.float-label-control { position: relative; margin-bottom: 1.5em; }
    .float-label-control ::-webkit-input-placeholder { color: transparent; }
    .float-label-control :-moz-placeholder { color: transparent; }
    .float-label-control ::-moz-placeholder { color: transparent; }
    .float-label-control :-ms-input-placeholder { color: transparent; }
    .float-label-control input:-webkit-autofill,
    .float-label-control textarea:-webkit-autofill { background-color: transparent !important; -webkit-box-shadow: 0 0 0 1000px white inset !important; -moz-box-shadow: 0 0 0 1000px white inset !important; box-shadow: 0 0 0 1000px white inset !important; }
    .float-label-control input, .float-label-control textarea, .float-label-control label { font-size: 1.3em; box-shadow: none; -webkit-box-shadow: none; }
        .float-label-control input:focus,
        .float-label-control textarea:focus { box-shadow: none; -webkit-box-shadow: none; border-bottom-width: 2px; padding-bottom: 0; }
        .float-label-control textarea:focus { padding-bottom: 4px; }
    .float-label-control input, .float-label-control textarea { display: block; width: 100%; padding: 0.1em 0em 1px 0em; border: none; border-radius: 0px; border-bottom: 1px solid #aaa; outline: none; margin: 0px; background: none; }
    .float-label-control textarea { padding: 0.1em 0em 5px 0em; }
    .float-label-control label { position: absolute; font-weight: normal; top: -1.0em; left: 0.08em; color: #aaaaaa; z-index: -1; font-size: 0.85em; -moz-animation: float-labels 300ms none ease-out; -webkit-animation: float-labels 300ms none ease-out; -o-animation: float-labels 300ms none ease-out; -ms-animation: float-labels 300ms none ease-out; -khtml-animation: float-labels 300ms none ease-out; animation: float-labels 300ms none ease-out; /* There is a bug sometimes pausing the animation. This avoids that.*/ animation-play-state: running !important; -webkit-animation-play-state: running !important; }
    .float-label-control input.empty + label,
    .float-label-control textarea.empty + label { top: 0.1em; font-size: 1.5em; animation: none; -webkit-animation: none; }
    .float-label-control input:not(.empty) + label,
    .float-label-control textarea:not(.empty) + label { z-index: 1; }
    .float-label-control input:not(.empty):focus + label,
    .float-label-control textarea:not(.empty):focus + label { color: #aaaaaa; }
    .float-label-control.label-bottom label { -moz-animation: float-labels-bottom 300ms none ease-out; -webkit-animation: float-labels-bottom 300ms none ease-out; -o-animation: float-labels-bottom 300ms none ease-out; -ms-animation: float-labels-bottom 300ms none ease-out; -khtml-animation: float-labels-bottom 300ms none ease-out; animation: float-labels-bottom 300ms none ease-out; }
    .float-label-control.label-bottom input:not(.empty) + label,
    .float-label-control.label-bottom textarea:not(.empty) + label { top: 3em; }

.breadcrumb {background: rgba(206, 224, 245, 1); border: 0px solid rgba(245, 245, 245, 1); border-radius: 4px; display: block;}
.breadcrumb li {font-size: 14px;}
.breadcrumb a {color: rgba(14, 61, 102, 1);}
.breadcrumb a:hover {color: rgba(12, 90, 158, 1);}
.breadcrumb>.active {color: rgba(110, 93, 24, 1);}
.breadcrumb>li+li:before {color: rgba(117, 64, 14, 1); content: "\2771\00a0";}


    .jtable-child-table-container{
        margin-left: 25px;
    }
    .menuPanelBody { padding:0px; }
    .menuPanelBody table tr td { padding-right: 15px }
    .menuPanelBody .table {margin-bottom: 0px; }    
/* Loading Circle */
.ball {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-top:5px solid rgba(0,0,0,0);
	border-left:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 35px #2187e7;
	width:50px;
	height:50px;
	margin:0 auto;
	-moz-animation:spin .5s infinite linear;
	-webkit-animation:spin .5s infinite linear;
}
.ball1 {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-top:5px solid rgba(0,0,0,0);
	border-left:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 15px #2187e7; 
	width:30px;
	height:30px;
	margin:0 auto;
	position:relative;
	top:-50px;
	-moz-animation:spinoff .5s infinite linear;
	-webkit-animation:spinoff .5s infinite linear;
}
@-moz-keyframes spin {
	0% { -moz-transform:rotate(0deg); }
	100% { -moz-transform:rotate(360deg); }
}
@-moz-keyframes spinoff {
	0% { -moz-transform:rotate(0deg); }
	100% { -moz-transform:rotate(-360deg); }
}
@-webkit-keyframes spin {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(360deg); }
}
@-webkit-keyframes spinoff {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(-360deg); }
}
/* Second Loadin Circle */
.circle {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-right:5px solid rgba(0,0,0,0);
	border-left:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 35px #2187e7;
	width:50px;
	height:50px;
	margin:0 auto;
	-moz-animation:spinPulse 1s infinite ease-in-out;
	-webkit-animation:spinPulse 1s infinite linear;
}
.circle1 {
	background-color: rgba(0,0,0,0);
	border:5px solid rgba(0,183,229,0.9);
	opacity:.9;
	border-left:5px solid rgba(0,0,0,0);
	border-right:5px solid rgba(0,0,0,0);
	border-radius:50px;
	box-shadow: 0 0 15px #2187e7; 
	width:30px;
	height:30px;
	margin:0 auto;
	position:relative;
	top:-40px;
	-moz-animation:spinoffPulse 1s infinite linear;
	-webkit-animation:spinoffPulse 1s infinite linear;
}
@-moz-keyframes spinPulse {
	0% { -moz-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #2187e7;}
	50% { -moz-transform:rotate(145deg); opacity:1; }
	100% { -moz-transform:rotate(-320deg); opacity:0; }
}
@-moz-keyframes spinoffPulse {
	0% { -moz-transform:rotate(0deg); }
	100% { -moz-transform:rotate(360deg);  }
}
@-webkit-keyframes spinPulse {
	0% { -webkit-transform:rotate(160deg); opacity:0; box-shadow:0 0 1px #2187e7; }
	50% { -webkit-transform:rotate(145deg); opacity:1;}
	100% { -webkit-transform:rotate(-320deg); opacity:0; }
}
@-webkit-keyframes spinoffPulse {
	0% { -webkit-transform:rotate(0deg); }
	100% { -webkit-transform:rotate(360deg); }
}   
    
.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
    
</style>
</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{Request::root()}}/userAccount"><img src="{{Request::root()}}/public/assets/userAccount/images/logo.png" width="150" alt="" style="margin: -5px;"> </a>
                <a class="navbar-brand"><i class="fa fa-user"></i> {{ auth()->guard('user')->user()->name }}  <label class="label label-warning">{{ auth()->guard('user')->user()->getRank() }} </label> </a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
				<li>
					<a href="#">
                       <strong> {{ auth()->guard('user')->user()->email }} </strong>
                    </a>
				</li>
				{{--  <li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-language fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="{{Request::root()}}/language/ar">
                                <div>
                                    <strong>عربي</strong>
                                    <span class="pull-right text-muted">
                                        <em>اللغة العربية</em>
                                    </span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul> 
                    <!-- /.dropdown-messages -->
                </li>  --}}
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{Request::root()}}/logout"><i class="fa fa-sign-out fa-fw"></i> تسجيل الخروج </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            
            <div class="navbar-default sidebar" role="navigation">
                <div class="margin-top-15" style="text-align:center">
                    <img style="margin:0 auto;" src="{{ auth()->guard('user')->user()->picture }}" class="thumbnail img-responsive" />
                </div>
                
                <div class="panel-group" id="accordion" style="margin:15px;">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="{{Request::root()}}/userAccount/dashboard">
                                        <span class="fa fa-fw fa-home"></span> {{Lang::get('site.home')}}</a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="{{Request::root()}}/userAccount/services/add">
                                        <span class="fa fa-fw fa-plus"></span> أضف خدمة </a>
                                </h4>
                            </div>
                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#activities">
                                        <span class="fa fa-fw fa-comments"></span> الخدمات</a>
                                </h4>
                            </div>
                            <div id="activities" class="panel-collapse collapse">
                                <div class="panel-body menuPanelBody">
                                    <table class="table">
                                        <tr><td><a href="{{request()->root()}}/userAccount/activities"><i class="fa fa-fw fa-comments"></i> أنشطتي </a></td></tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        <div id="page-wrapper" style="padding-bottom:50px; background:url('{{Request::root()}}/public/assets/userAccount/images/mainAreaBG.jpg') left top; background-size: cover">
            <div class="row">
	            <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- script src="//code.jquery.com/jquery-2.1.0.min.js"></script -->
    <script src="{{Request::root()}}/public/assets/userAccount/jtable/jquery-1.9.1.min.js"></script>
    <script src="{{Request::root()}}/public/assets/userAccount/js/bootstrap.min.js"></script>
    
    <script src="{{Request::root()}}/public/assets/userAccount/jtable/jquery-ui-1.10.0.min.js"></script>
    <!-- Include jTable script file. -->
    <script src="{{Request::root()}}/public/assets/userAccount/jtable/jquery.jtable.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{Request::root()}}/public/assets/userAccount/jtable/localization/jquery.jtable.ar.js"></script>
    <script type="text/javascript" src="{{Request::root()}}/public/assets/userAccount/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{{Request::root()}}/public/assets/userAccount/ckeditor/adapters/jquery.js"></script>
    <script src="{{Request::root()}}/public/assets/userAccount/uploadify/jquery.uploadify.min.js"></script>
    <script src="{{Request::root()}}/public/assets/photoGallery/js/photo-gallery.js" type="text/javascript" charset="utf-8"></script>
    
    @yield('scripts')
</body>
</html>