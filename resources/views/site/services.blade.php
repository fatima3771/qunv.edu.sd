@php 
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
	$testimonials = App\Testimonial::orderByRaw('rand()')->limit(4)->get();
@endphp
@extends('site.layouts.master')

@section('meta-title')
	@lang('site.services') - 
@endsection

@section('meta-description')
	@lang('site.services')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.services')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.aboutUs')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.services')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<!-- -->
<section>
	<div class="container">

		<div class="row">
			@php $i=0; @endphp
			@foreach($services as $service)
				<div class="col-lg-4 col-md-4 col-sm-4">
					<figure class="mb-20">
						<a href="{{ $service->getLink() }}"><img class="img-fluid" src="{{$service->getPicture()}}" alt="service" /></a>
					</figure>

					<a href="{{ $service->getLink() }}">
						<h4 class="mb-0">@lang('site.getContent', ['ar'=>$service->title, 'en'=>$service->titleEn ])</h4>
					</a>
					{{-- <small class="font-lato fs-18 mb-30 block">لأننا الأفضل!</small> --}}
					<p class="text-muted fs-14">
						@lang('site.getContent', ['ar'=>Str::words(strip_tags($service->txt),30), 'en'=>Str::words(strip_tags($service->txtEn),30)])
					</p>

					<a href="{{ $service->getLink() }}">
						@lang('site.read')
						<!-- /word rotator -->
						<span class="word-rotator" data-delay="2000">
							<span class="items">
								<span>@lang('site.more')</span>
								<span>@lang('site.details')</span>
							</span>
						</span><!-- /word rotator -->
						<i class="glyphicon glyphicon-menu-@lang('site.getContent', ['ar'=>'left', 'en'=>'right']) fs-12"></i>
					</a>
				</div>
				@if(++$i%3==0)
					</div><div class="row" style="margin-top: 50px;">
				@endif
			@endforeach
		</div>

	</div>
</section>
<!-- / -->
	   

@stop
