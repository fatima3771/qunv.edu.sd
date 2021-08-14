@php $lang = \Lang::get('site.getContent',['ar' => 1, 'en' => 2]); @endphp
<!DOCTYPE html>
<html dir="{{ __('site.getContent',['ar'=>'rtl','en'=>'ltr']) }}" lang="{{ __('site.getContent',['ar'=>'ar','en'=>'en']) }}">
<head>
	@include('site.layouts.header')	
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
<!--   <div id="preloader">
    <div id="spinner">
      <img alt="" src="{{ request()->root() }}/public/assets/learnpro/images/preloaders/5.gif">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
 -->  
  <!-- Header -->
  <header id="header" class="header modern-header modern-header-white">
    <div class="header-top bg-theme-colored2 sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6 hidden-sm hidden-xs">
            <div class="widget text-white">
              <ul class="list-inline xs-text-center text-white">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-white"></i> {{ __('site.addressPhone') }}</a> </li>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-white mr-5"></i> {{ __('site.addressEmail') }}</a> 
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-0 hidden-sm hidden-xs">
            <div class="widget">
              <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                <li><a href="https://web.facebook.com/qkunv" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                <li><a href="https://www.youtube.com/channel/UC9LngkPWp1OF132vIgtMRXA" target="_blank"><i class="fa fa-youtube text-white"></i></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">
              <li class="m-0 pl-0 pr-10"> 
                <a href="{{ changeLocaleInRoute(\Illuminate\Support\Facades\Route::current(), Lang::get('site.getContent', ['ar'=>'en','en'=>'ar'])) }}" class="text-white"><i class="fa fa-language mr-5"></i> @lang('site.getContent', ['ar'=>'English','en'=>'عربي']) </a> 
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center pb-30">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-4">
            <a class="menuzord-brand pull-left flip sm-pull-center mb-15" href="index-mp-layout1.html"><img src="{{ request()->root() }}/public/assets/learnpro/images/@lang('site.getContent',['ar' => 'logo.ar.png','en' => 'logo.png'])" alt=""></a>
          </div>
          @section('collegeTitle')
            <div class="col-xs-12 col-sm-12 col-md-8 pt-10 hidden-sm hidden-xs">
              <div class="header-widget-contact-info-box sm-text-center">
                <div class="media element contact-info">
                  <div class="media-left">
                    <a href="#">
                      <i class="fa fa-envelope text-theme-colored font-icon sm-display-block"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#" class="title">{{ __('site.email') }}</a>
                    <h5 class="media-heading subtitle">{{ __('site.addressEmail') }}</h5>
                  </div>
                </div>
                <div class="media element contact-info">
                  <div class="media-left">
                    <a href="#">
                      <i class="fa fa-phone-square text-theme-colored font-icon sm-display-block"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#" class="title">{{ __('site.phone') }}</a>
                    <h5 class="media-heading subtitle">{{ __('site.addressPhone') }}</h5>
                  </div>
                </div>
                <div class="media element contact-info">
                  <div class="media-left">
                    <a href="#">
                      <i class="fa fa-map-marker text-theme-colored font-icon sm-display-block"></i>
                    </a>
                  </div>
                  <div class="media-body">
                    <a href="#" class="title">{{ __('site.address') }}</a>
                    <h5 class="media-heading subtitle">{{ __('site.addressLine1') }}</h5>
                  </div>
                </div>
              </div>
            </div>
          @show
        </div>
      </div>
    </div>

    @section('menu')
	    @include('site.menu')
    @show
  </header>
  
  
  <!-- Start main-content -->
  <div class="main-content">
    @section('content')
        
    @show
  </div>
  <!-- Footer -->
  <footer id="footer" class="footer" data-bg-color="#212331">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <!-- <img class="mt-5 mb-20" alt="" src="images/logo-white-footer.png"> -->
            <p>@lang('site.addressLine1')</p>
            <ul class="list-inline mt-5">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">@lang('site.addressPhone')</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i> <a class="text-gray" href="#">@lang('site.addressEmail')</a> </li>
            </ul>            
            <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
              <li><a href="@lang('site.facebookUrl')"  target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-vk"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UC9LngkPWp1OF132vIgtMRXA" target="_blank"><i class="fa fa-youtube text-white"></i></a></li>

            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">@lang('site.usefulLinks')</h4>
            <ul class="angle-double-right list-border">
				@php $i = 0; @endphp
				@foreach(\App\Page::where('publish',1)->orderByRaw('rand()')->get() as $menuItem)
					@if(!$menuItem->hasChild())
						@if($i++<4)
							<li><a href="{{ $menuItem->getLink() }}">@lang('site.getContent', ['ar'=>$menuItem->title, 'en'=>$menuItem->titleEn])</a></li>
						@endif
					@endif
				@endforeach
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">@lang('site.latestNews')</h4>
            <div class="latest-posts">
				@php $latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(4)->get(); @endphp
				@foreach($latestNews as $lNews)
					<article class="post media-post clearfix pb-0 mb-10">
						<a class="post-thumb" href="#"><img src="https://placehold.it/80x55" alt=""></a>
						<div class="post-right">
						<h5 class="post-title mt-0 mb-5"><a href="#">{{ Str::words(strip_tags($lNews->title),5) }}</a></h5>
						<p class="post-date mb-0 font-12">{{ date('d-m-Y', strtotime($lNews->getDate())) }}</p>
						</div>
					</article>
				@endforeach
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">Opening Hours</h4>
            <div class="opening-hours">
              <ul class="list-border">
                <li class="clearfix"> <span> Mon - Tues :  </span>
                  <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                </li>
                <li class="clearfix"> <span> Wednes - Thurs :</span>
                  <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                </li>
                <li class="clearfix"> <span> Fri : </span>
                  <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                </li>
                <li class="clearfix"> <span> Sun : </span>
                  <div class="value pull-right bg-theme-colored2 text-white closed"> Closed </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom" data-bg-color="#2b2d3b">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p class="font-12 text-black-777 m-0 sm-text-center">{{ date("Y") }} &copy; @lang('site.rightsReserved'), @lang('site.siteName')</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="#"><a href="{{ route('termsOfUse', [app()->getLocale()]) }}">@lang('site.termsOfUse')</a></a>
                </li>
                <li>|</li>
                <li>
                  <a href="#"><a href="{{ route('privacyPolicy', [app()->getLocale()]) }}">@lang('site.privacyPolicy')</a></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

	@include('site.layouts.footer')

	@section('scripts')
			
	@show

</body>
</html>