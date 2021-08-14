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

		<h1>{{ __('site.getContent', ['ar' => $job->title, 'en' => $job->titleEn]) }}</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.jobs')</span>

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
				<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
					<div class="heading-title heading-border">
                        <h2><span>{{ __('site.getContent', ['ar' => $job->title, 'en' => $job->titleEn]) }}</span></h2>
                    </div>
                    
                    <ul class="blog-post-info list-inline">
                        <li>
                            <a href="#">
                                <i class="fa fa-clock-o"></i> 
                                <span class="font-lato">{{ __('site.deadline') }} {{ $job->start_date }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-eye"></i> 
                                <span class="font-lato">{{ $job->views }}</span>
                            </a>
                        </li>
                    </ul>
            
                    <figure class="mb-20">
                        <img class="img-fluid" src="{{ $job->getPicture() }}" alt="img" style="border:1px solid #CCC;" />
                    </figure>

                    <p class="lead" style="text-align: justify;">
                        {!! $job->summary !!}
                    </p>                    

                    <div class="heading-title heading-border">
                        <h4><span>{{ __('site.duties') }}</span></h4>
                    </div>

                    <p class="lead" style="text-align: justify;">
                        {!! $job->duties !!}
                    </p>

                    <div class="heading-title heading-border">
                        <h4><span>{{ __('site.requirements') }}</span></h4>
                    </div>

                    <p class="lead" style="text-align: justify;">
                        {!! $job->requirements !!}
                    </p>
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
