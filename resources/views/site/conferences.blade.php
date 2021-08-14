@extends('site.layouts.master')

@section('meta-title')
    @lang('site.conferences') - 
@endsection

@section('meta-description')
@endsection
	
@section('content')


<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		    <h1>@lang('site.conferences')</h1>
		    <span class="font-lato1 fs-18 fw-300"></span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
                <li>@lang('site.conferences')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section class="pt-15">
	<div class="container">
		
		<div class="row">
		
			<!-- RIGHT -->
			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
                {{ $data->links() }}
				@foreach($data as $d)
                    <div class="clearfix search-result"><!-- item -->
                        <h4 class="mb-0"><a href="{{ $d->getUrl() }}"> @lang('site.getContent', ['ar'=>$d->title, 'en'=>$d->title_en ])</a></h4>
                        <i class="fa fa-map-marker" aria-hidden="true"></i><small> {{ $d->trans('country') }} - {{ $d->trans('city') }} - {{ $d->trans('address') }}</small>
                        <i class="fa fa-calendar" aria-hidden="true"></i><small> {{ $d->start_at }} - {{ $d->end_at }}</small>
                        @if($d->abstract)
                            <p>{!! Lang::get('site.getContent', ['ar'=>Str::words(strip_tags($d->txt,15)), 'en'=>Str::words(strip_tags($d->txt_en,15)) ]) !!}</p>
                        @endif
                        <br/>
                        <a class="btn btn-sm btn-primary" href="{{ $d->getUrl() }}" target="_blank"> <i class="fa fa-info-circle" aria-hidden="true"></i> @lang('site.more') </a>
                         {{-- | <i class="fa fa-eye" aria-hidden="true"></i> {{ $d->views }} --}}
                    </div>
                @endforeach
                {{ $data->links() }}
			</div>



			<!-- LEFT -->
			<div class="col-md-3 col-sm-3">
                <div class="side-nav">
                    <ul class="list-group list-group-bordered list-group-noicon uppercase">
                        {{-- @foreach($types as $type)
                            <li class="list-group-item @if(isset($current_type->id) && $current_type->id == $type->id) active @endif">
                                <a href="{{ route('library',[app()->getLocale(), $type->slug]) }}">
                                    <span class="fs-11 text-muted float-right ">({{ $type->libraries->count() }})</span> 
                                    @lang('site.getContent', ['ar'=>$type->title, 'en'=>$type->title_en]) 
                                </a>
                            </li>
                        @endforeach --}}
                    </ul>
                </div>		
            </div>
		</div>
		
	</div>
</section>
	
@stop