@php 
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
	$testimonials = App\Testimonial::orderByRaw('rand()')->limit(4)->get();
@endphp
@extends('site.layouts.master')

@section('meta-title')
	@lang('site.getContent',['ar'=>$service->title, 'en'=>$service->titleEn]) - 
@endsection

@section('meta-description')
	@if(App::isLocale('ar'))
		{!! Str::words(strip_tags($service->txt),50) !!}
	@else
		{!! Str::words(strip_tags($service->txtEn),50) !!}
	@endif
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.getContent',['ar'=>$service->title, 'en'=>$service->titleEn])</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.eServices')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li><a href="{{ route('services', [app()->getLocale()]) }}">@lang('site.services')</a></li>
			<li>@lang('site.getContent',['ar'=>$service->title, 'en'=>$service->titleEn])</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<!-- -->
<section>
	<div class="container">

		<div class="row">
			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
				<div class="heading-title heading-border">
					<h2><span>@lang('site.getContent',['ar'=>$service->title, 'en'=>$service->titleEn])</span></h2>
				</div>
				
				<figure class="mb-20">
					<img class="img-fluid" src="{{ $service->getPicture() }}" alt="img" />
				</figure>

				<p class="lead" style="text-align: justify;">
					@lang('site.getContent',['ar'=>$service->txt, 'en'=>$service->txtEn])
				</p>
			</div>
			<div class="col-md-3 col-sm-3">

				<!-- side navigation -->
				<div class="side-nav mb-60 mt-30">

					<div class="side-nav-head">
						<button class="fa fa-bars"></button>
						<h4>@lang('site.services')</h4>
					</div>
					<ul class="list-group list-group-bordered list-group-noicon uppercase">
						<?php $services = App\Service::orderBy('id')->get(); ?>
						@foreach($services as $s)
							<li class="list-group-item">
								<a href="{{$s->getLink()}}">
									@lang('site.getContent',['ar'=>$s->title,'en'=>$s->titleEn])
								</a>
							</li>
						@endforeach
					</ul>
					<!-- /side navigation -->

				
				</div>

			</div>
		</div>
	</div>
</section>
	@stop
