@extends('site.layouts.master')

@section('meta-title')
	@lang('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn]) - 
@endsection

@section('meta-description')
	@if(App::isLocale('ar'))
		{!! Str::words(strip_tags($page->txt),50) !!}
	@else
		{!! Str::words(strip_tags($page->txtEn),50) !!}
	@endif
@endsection
	
@section('content')

 <!-- Section: inner-header -->
 <section class="inner-header divider layer-overlay overlay-theme-colored-1" data-bg-img="{{ request()->root() }}/public/images/headerBg.jpg">
	<div class="container pt-50 pb-10">
	  <!-- Section Content -->
	  <div class="section-content">
		<div class="row"> 
		  <div class="col-md-6">
			<h2 class="text-theme-colored2 font-36">@lang('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn])</h2>
			<ol class="breadcrumb text-left mt-10 white">
				<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
				<li>@lang('site.aboutUs')</li>
				<li>@lang('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn])</li>
			</ol>
		  </div>
		</div>
	  </div>
	</div>
  </section>

<!-- Section: Blog -->
<section>
	<div class="container mt-30 mb-30 pt-30 pb-30">
	  <div class="row">
		<div class="col-md-9">
		  <div class="blog-posts single-post">
			<article class="post clearfix mb-0">
			  <div class="entry-header">
				<div class="post-thumb thumb"> <img src="{{ $page->getPicture() }}" alt="" class="img-responsive img-fullwidth"> </div>
			  </div>
			  <div class="entry-content">
				<div class="entry-meta media no-bg no-border mt-15 pb-20">
				  <div class="media-body pl-15">
					<div class="event-content pull-left flip">
					  <h3 class="entry-title text-white text-uppercase pt-0 mt-0"><a href="blog-single-right-sidebar.html">@lang('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn])</a></h3>
					  <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-commenting-o mr-5 text-theme-colored"></i> 214 Comments</span>                       
					  <span class="mb-10 text-gray-darkgray mr-10 font-13"><i class="fa fa-heart-o mr-5 text-theme-colored"></i> 895 Likes</span>
					</div>
				  </div>
				</div>
				<p class="mb-15">
					@if(App::isLocale('ar'))
						{!! $page->txt !!}
					@else
						{!! $page->txtEn !!}
					@endif
				</p>
				<div class="mt-30 mb-0">
				  <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
				  <ul class="styled-icons icon-circled m-0">
					<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ $page->getLink() }}" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
					<li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
					<li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
				  </ul>
				</div>
			  </div>
			</article>
		  </div>
		</div>
		<div class="col-md-3">
		  <div class="sidebar sidebar-left mt-sm-30">
			@include('site.subMenu')
			@include('site.newsMenu')			
		  </div>
		</div>
	  </div>
	</div>
  </section>	
@stop