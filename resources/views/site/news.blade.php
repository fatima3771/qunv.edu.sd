@extends('site.layouts.master')

@section('meta-title')
    @lang('site.news') - 
@endsection

@section('meta-description')
    @lang('site.news')
@endsection

@section('content')


<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
    <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>
    
	<div class="container">

        <h1>@lang('site.news')</h1>
        <span class="font-lato1 fs-18 fw-300">@lang('site.aboutUs')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.news')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>	


<section>
    <div class="container">

        <div class="row">

            @foreach($news as $n)
                <!-- POST ITEM -->
                <div class="blog-post-item col-md-4 col-sm-4">

                    <!-- IMAGE -->
                    <figure class="mb-20">
                        <a href="{{ $n->getUrl() }}"><img class="img-fluid" src="{{ $n->getPicture() }}" style="height: 200px; border:1px solid #CCC;" alt=""></a>
                    </figure>

                    <h2><a href="{{ $n->getUrl() }}">{{ Str::words(strip_tags($n->title),5) }}</a></h2>

                    <ul class="blog-post-info list-inline">
                        <li>
                            <a>
                                <i class="fa fa-clock-o"></i> 
                                <span class="font-lato">{{ $n->getDate() }}</span>
                            </a>
                        </li>
                        <li>
                            <a>
                                <i class="fa fa-eye"></i> 
                                <span class="font-lato">{{ $n->readingCount }}</span>
                            </a>
                        </li>
                    </ul>

                    <p>{{ Str::words(strip_tags($n->txt),12) }}</p>

                    <a href="{{ $n->getUrl() }}" class="btn btn-reveal btn-default b-0 btn-shadow-1">
                        <i class="fa fa-plus"></i>
                        <span>@lang('site.more')</span>
                    </a>

                </div>
                <!-- /POST ITEM -->
            @endforeach

        </div>

    </div>
</section>

@stop