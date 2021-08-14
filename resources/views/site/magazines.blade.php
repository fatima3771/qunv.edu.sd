@php 
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
@endphp
@extends('site.layouts.master')

@section('meta-title')
	@lang('site.magazines')
@endsection

@section('meta-description')
@endsection
	
@section('content')


<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.magazines')</h1>
		<span class="font-lato1 fs-18 fw-300"></span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.magazines')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section class="pt-15">
	<div class="container">
		
		<div class="row">
		
			<!-- RIGHT -->

			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
				{{-- <div class="heading-title heading-border">
					<h2><span>@lang('site.magazines')</span></h2>	
				</div> --}}
				
                @foreach($magazines as $magazine)
                    <div class="clearfix search-result"><!-- item -->
                        <h4 class="mb-0"><a href="{{ $magazine->getUrl() }}">@lang('site.getContent',['ar'=>$magazine->title,'en'=>$magazine->titleEn])</a></h4>
                        @if($magazine->issues())
                            <small class="text-muted">
                                عدد الأعداد: {{ $magazine->issues->count() }}
                            </small>
                        @endif
                    </div>
                @endforeach
				
			</div>



			<!-- LEFT -->
			<div class="col-md-3 col-sm-3">

			</div>		
		</div>
		
	</div>
</section>
	
@stop