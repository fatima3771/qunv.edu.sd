@php 
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
	$testimonials = App\Testimonial::orderByRaw('rand()')->limit(4)->get();
@endphp
@extends('site.layouts.master')

@section('meta-title')
	@lang('site.jobs') - 
@endsection

@section('meta-description')
	@lang('site.jobs')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.jobs')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.aboutUs')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.jobs')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<!-- -->
<section>
	<div class="container">

		<div class="row">
			@php $i=0; @endphp
			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">			
					@foreach($jobs as $job)
						{{-- <figure class="mb-20">
							<a href="{{ $job->getUrl() }}"><img class="img-fluid" src="{{$job->getPicture()}}" alt="job" /></a>
						</figure> --}}

						<a href="{{ $job->getUrl() }}">
							<h4 class="mb-0">@lang('site.getContent', ['ar'=>$job->title, 'en'=>$job->titleEn ])</h4>
						</a>
						<small> 
							<i class="fa fa-fw fa-calendar"></i> {{ __('site.closing_date') }} {{ $job->start_date }} |
							<i class="fa fa-fw fa-user"></i> {{ __('site.vacancies') }} {{ $job->start_date }}
						</small>
						{{-- <small class="font-lato fs-18 mb-30 block">لأننا الأفضل!</small> --}}
						<p class="text-muted fs-14">
							@lang('site.getContent', ['ar'=>Str::words(strip_tags($job->summary),30), 'en'=>Str::words(strip_tags($job->summaryEn),30)])
						</p>
					@endforeach
				</div>
				<!-- LEFT -->
			<div class="col-md-3 col-sm-3">

				<!-- SOCIAL ICONS -->
				<div class="hidden-xs-down mt-30 mb-60">
					<a target="_blank" href="https://www.facebook.com/fibsudan1" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a target="_blank" href="https://www.twitter.com/fibsudan1" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					{{-- <a target="_blank"  href="#" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a> --}}

					<a target="_blank" href="https://www.youtube.com/channel/UCqDs_pwyLvWeFPhcsCJNiXw" class="social-icon social-icon-border social-youtube float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Youtube">
						<i class="icon-youtube"></i>
						<i class="icon-youtube"></i>
					</a>
				</div>

			</div>
		</div>

	</div>
</section>
<!-- / -->
	   

@stop
