@php $lang = \Lang::get('site.getContent',['ar' => 1, 'en' => 2]); @endphp

<!DOCTYPE html>
<html lang="en">

    <head>
		@include('site.layouts.header')		
	</head>

	<!--
		AVAILABLE BODY CLASSES:
		
		smoothscroll 			= create a browser smooth scroll
		enable-animation		= enable WOW animations

		bg-grey					= grey background
		grain-grey				= grey grain background
		grain-blue				= blue grain background
		grain-green				= green grain background
		grain-blue				= blue grain background
		grain-orange			= orange grain background
		grain-yellow			= yellow grain background
		
		boxed 					= boxed layout
		pattern1 ... patern11	= pattern background
		menu-vertical-hide		= hidden, open on click
		
		BACKGROUND IMAGE [together with .boxed class]
		data-background="/public/assets/images/_smarty/boxed_background/1.jpg"
	-->
	<body class="smoothscroll enable-animation">

        <!-- wrapper -->
		<div id="wrapper">

			<!-- Top Bar -->
			<div id="topBar" class="dark">
				<div class="container">
					<!-- right -->
					<ul class="top-links list-inline float-right">
						{{-- <li><a href="{{ request()->root() }}/lang/@lang('site.getContent', ['ar'=>'en','en'=>'ar'])"> @lang('site.getContent', ['ar'=>'English Site','en'=>'الموقع العربي']) </a></li> --}}
						<li><a href="{{ changeLocaleInRoute(\Illuminate\Support\Facades\Route::current(), Lang::get('site.getContent', ['ar'=>'en','en'=>'ar'])) }}"> @lang('site.getContent', ['ar'=>'English','en'=>'عربي']) </a></li>
						{{-- <li><a></a></li> --}}
					</ul>
					<!-- left -->
					<ul class="top-links list-inline">
						<li class="text-welcome hidden-xs-down text-white">@lang('site.eBanking')</span> </li>
						<li><a target="_blank" href="https://ebank.fib-sd.com/Connect/Login?t=1"> <i class="fa fa-fw fa-user"></i> @lang('site.eBankingRetail') </a></li>
						<li><a target="_blank" href="https://ebank.fib-sd.com/Connect/Login?t=2"> <i class="fa fa-fw fa-bank"></i> @lang('site.eBankingCorporate') </a></li>
					</ul>
				</div>
			</div>
			<!-- /Top Bar -->

			<!-- 
				AVAILABLE HEADER CLASSES

				Default nav height: 96px
				.header-md 		= 70px nav height
				.header-sm 		= 60px nav height

				.b-0 		= remove bottom border (only with transparent use)
				.transparent	= transparent header
				.translucent	= translucent header
				.sticky			= sticky header
				.static			= static header
				.dark			= dark header
				.bottom			= header on bottom
				
				shadow-before-1 = shadow 1 header top
				shadow-after-1 	= shadow 1 header bottom
				shadow-before-2 = shadow 2 header top
				shadow-after-2 	= shadow 2 header bottom
				shadow-before-3 = shadow 3 header top
				shadow-after-3 	= shadow 3 header bottom

				.clearfix		= required for mobile menu, do not remove!

				Example Usage:  class="clearfix sticky header-sm transparent b-0"
			-->
			<div id="header" class="navbar-toggleable-md sticky clearfix">

				
			

				<!-- TOP NAV -->
				<header id="topNav">
					<div class="container">

						<!-- Mobile Menu Button -->
						<button class="btn btn-mobile" data-toggle="collapse" data-target=".nav-main-collapse">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Logo -->
						<a class="logo float-left" href="{{ route('home', [app()->getLocale()]) }}">
							<img src="{{ request()->root() }}/public/assets/images/_smarty/@lang('site.getContent',['ar' => 'logo.ar.png','en' => 'logo.png'])" alt="" />
						</a>

						<!-- 
							Top Nav 
							
							AVAILABLE CLASSES:
							submenu-dark = dark sub menu
                        -->
                        @include('site.menu')

					</div>
				</header>
				<!-- /Top Nav -->

			</div>


            @section('content')
                
            @show

			<!-- FOOTER -->
			<footer id="footer">
				<div class="container">

					<div class="row">
						
						<div class="col-md-3">
							<!-- Footer Logo -->
							<img class="footer-logo" src="{{ request()->root() }}/public/assets/images/_smarty/logo-footer.ar.png" alt="" style="width: 100%" />

							<!-- Small Description -->
							<p style="text-align: justify;">@lang('site.aboutUsDesc')</p>

							<!-- Contact Address -->
							<address>
								<ul class="list-unstyled">
									<li class="footer-sprite address">
										@lang('site.addressLine1')<br>
									</li>
									<li class="footer-sprite phone">
										@lang('site.phone'): <span dir="ltr">@lang('site.addressPhone')</span>
									</li>
									<li class="footer-sprite email">
										<a href="mailto:@lang('site.addressEmail')">@lang('site.addressEmail')</a>
									</li>
								</ul>
							</address>
							<!-- /Contact Address -->

						</div>

						<div class="col-md-3">
							@php $latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get(); @endphp
							<!-- Latest Blog Post -->
							<h4 class="letter-spacing-1">@lang('site.latestNews')</h4>
							<ul class="footer-posts list-unstyled">
								@foreach($latestNews as $lNews)
									<li>
										<a href="{{ $lNews->getUrl() }}">{{ $lNews->title }}</a>
										<small>{{ $lNews->getDate() }}</small>
									</li>
								@endforeach
							</ul>
							<!-- /Latest Blog Post -->

						</div>

						<div class="col-md-2">

							<!-- Links -->
							<h4 class="letter-spacing-1">@lang('site.more')</h4>
							<ul class="footer-links list-unstyled">
								@php $i = 0; @endphp
								@foreach(\App\Page::where('publish',1)->get() as $menuItem)
									@if(!$menuItem->hasChild())
										@if($i++<7)
											<li><a href="{{ $menuItem->getLink() }}">@lang('site.getContent', ['ar'=>$menuItem->title, 'en'=>$menuItem->titleEn])</a></li>
										@endif
									@endif
								@endforeach
							</ul>
							<!-- /Links -->

						</div>

						<div class="col-md-4">

							<!-- Newsletter Form -->
							<h4 class="letter-spacing-1">@lang('site.connectWithUs')</h4>
							<p>@lang('site.connectWithUsViaSocialMedia')</p>

							{{-- <form class="validate" action="php/newsletter.php" method="post" data-success="Subscribed! Thank you!" data-toastr-position="bottom-right">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
									<input type="email" id="email" name="email" class="form-control required" placeholder="Enter your Email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>
							</form>
							<!-- /Newsletter Form --> --}}

							<!-- Social Icons -->
							<div class="mt-20">
								<a href="https://www.facebook.com/fibsudan1" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="Facebook">

									<i class="icon-facebook"></i>
									<i class="icon-facebook"></i>
								</a>

								<a href="https://www.twitter.com/fibsudan1" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="Twitter">
									<i class="icon-twitter"></i>
									<i class="icon-twitter"></i>
								</a>

								<a href="https://www.youtube.com/channel/UCqDs_pwyLvWeFPhcsCJNiXw" class="social-icon social-icon-border social-youtube float-left" data-toggle="tooltip" data-placement="top" title="Youtube">
									<i class="icon-youtube"></i>
									<i class="icon-youtube"></i>
								</a>
					
							</div>
							<!-- /Social Icons -->

						</div>

					</div>

				</div>

				<div class="copyright">
					<div class="container">
						<ul class="float-right m-0 list-inline mobile-block">
							<li><a href="{{ route('termsOfUse', [app()->getLocale()]) }}">@lang('site.termsOfUse')</a></li>
							<li>&bull;</li>
							<li><a href="{{ route('privacyPolicy', [app()->getLocale()]) }}">@lang('site.privacyPolicy')</a></li>
						</ul>
						{{ date("Y") }} &copy; @lang('site.rightsReserved'), @lang('site.siteName')
					</div>
				</div>
			</footer>
			<!-- /FOOTER -->

		</div>
		<!-- /wrapper -->

		@include('site.layouts.footer')

		@section('scripts')
			
		@show
	</body>
</html>