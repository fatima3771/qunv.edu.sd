@php $page = App\Page::find(85); @endphp
@extends('site.layouts.master')

@section('meta-title')
    @lang('site.getContent', ['ar'=>$publicationType->title, 'en'=>$publicationType->titleEn]) - 
@endsection

@section('meta-description')
    @lang('site.getContent', ['ar'=>$publicationType->txt, 'en'=>$publicationType->txtEn])
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
    <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.getContent', ['ar'=>$publicationType->title, 'en'=>$publicationType->titleEn])</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.publications')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li><a href="{{ request()->root() }}/news">@lang('site.publications')</a></li>
			<li>@lang('site.getContent', ['ar'=>$publicationType->title, 'en'=>$publicationType->titleEn])</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>	

<section>
	<div class="container">
		<div class="row">

            <!-- LEFT -->
			<div class="col-md-3 col-sm-3">

				@include('site.subMenu')
				{{-- @include('site.newsMenu') --}}

			</div>	


            <!-- RIGHT -->
            <div class="col-md-9 col-sm-9">

                <!-- Subtitle -->
                <div class="heading-title heading-border">
                    <h2 class="fs-25">@lang('site.getContent', ['ar'=>$publicationType->title, 'en'=>$publicationType->titleEn])</h2>

                    <ul class="list-inline categories m-0">
                        <li><a href="{{ request()->root() }}/publications">@lang('site.publications')</a></li>
                    </ul>

                </div>
                <!-- /Subtitle -->

                <p>@lang('site.almalDesc')</p>

                <div class="container">

                    <div id="portfolio" class="clearfix portfolio-isotope portfolio-isotope-3" style="width: 1140px; position: relative; height: 733.204px;">
                        @foreach($issues as $issue)
                            <div class="portfolio-item has-title development" style="width: 365px; position: absolute; left: 0px; top: 0px;"><!-- item -->

                                <div class="item-box">
                                    <figure>
                                        <span class="item-hover">
                                            <span class="overlay dark-5"></span>
                                            <span class="inner">

                                                <!-- lightbox -->
                                                {{-- <a class="ico-rounded lightbox" href="{{ $issue->getImage() }}" data-plugin-options="{&quot;type&quot;:&quot;image&quot;}">
                                                    <span class="fa fa-eye fs-20"></span>
                                                </a> --}}

                                                <!-- details -->
                                                <a class="ico-rounded" target="_blank" href="{{ $issue->getPDF() }}">
                                                    <span class="glyphicon glyphicon-download fs-20"></span>
                                                </a>

                                            </span>
                                        </span>

                                        <!-- overlay title -->
                                        <div class="item-box-overlay-title">
                                            <h3>@lang('site.getContent', ['ar'=>'العدد '.$issue->issue, 'en'=>'Volume No. '.$issue->issue])</h3>
                                        </div><!-- /overlay title -->

                                        <img class="img-fluid" src="{{ $issue->getImage() }}" width="600" height="399" alt="">
                                    </figure>
                                </div>

                            </div><!-- /item -->
    
                        @endforeach
					</div>
					
				</div>


            </div>


		</div><!-- /.row -->           
	</div><!-- /.container -->   
</section>  

@stop