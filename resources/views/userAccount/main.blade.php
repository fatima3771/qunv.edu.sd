@extends('userAccount.layouts.beyond')

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="{{ request()->root() }}">@lang('site.home')</a>
		</li>
		<li class="active">حسابي</li>
<!-- /Page Breadcrumb -->
@endsection

@section('header-title')
	حسابي
@endsection

@section('content')

	<!-- Page Body -->
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="databox bg-white radius-bordered">
							<div class="databox-right bg-themesecondary">
								<div class="databox-piechart">
									<div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="50" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white font-90">50%</span><canvas width="47" height="47"></canvas></div>
								</div>
							</div>
							<div class="databox-left">
								<span class="databox-number themesecondary">28</span>
								<div class="databox-text darkgray">NEW TASKS</div>
								<div class="databox-stat themesecondary radius-bordered">
									<i class="stat-icon icon-lg fa fa-tasks"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="databox bg-white radius-bordered">
							<div class="databox-right bg-themethirdcolor">
								<div class="databox-piechart">
									<div data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="15" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.2)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white font-90">15%</span><canvas width="47" height="47"></canvas></div>
								</div>
							</div>
							<div class="databox-left">
								<span class="databox-number themethirdcolor">5</span>
								<div class="databox-text darkgray">NEW MESSAGE</div>
								<div class="databox-stat themethirdcolor radius-bordered">
									<i class="stat-icon  icon-lg fa fa-envelope-o"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="databox bg-white radius-bordered">
							<div class="databox-right bg-themeprimary">
								<div class="databox-piechart">
									<div id="users-pie" data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white font-90">76%</span><canvas width="47" height="47"></canvas></div>
								</div>
							</div>
							<div class="databox-left">
								<span class="databox-number themeprimary">92</span>
								<div class="databox-text darkgray">NEW USERS</div>
								<div class="databox-state bg-themeprimary">
									<i class="fa fa-check"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="databox bg-white radius-bordered">
							<div class="databox-right bg-themeprimary">
								<div class="databox-piechart">
									<div id="users-pie" data-toggle="easypiechart" class="easyPieChart" data-barcolor="#fff" data-linecap="butt" data-percent="76" data-animate="500" data-linewidth="3" data-size="47" data-trackcolor="rgba(255,255,255,0.1)" style="width: 47px; height: 47px; line-height: 47px;"><span class="white font-90">76%</span><canvas width="47" height="47"></canvas></div>
								</div>
							</div>
							<div class="databox-left">
								<span class="databox-number themeprimary">{{ number_format(auth()->guard('user')->user()->balance) }} SDG</span>
								<div class="databox-text darkgray">رصيد المحفظة</div>
								<div class="databox-state bg-themeprimary">
									<i class="fa fa-check"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


@stop