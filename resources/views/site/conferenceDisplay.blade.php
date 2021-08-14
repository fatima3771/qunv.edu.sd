@extends('site.layouts.master')

@section('meta-title')
    @lang('site.getContent',['ar'=>$data->title,'en'=>$data->titleEn]) - 
@endsection

@section('meta-description')
@endsection
	
@section('content')


<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		    <h1>@lang('site.getContent', ['ar'=>$data->title, 'en'=>$data->title_en ])</h1>
            <span>
                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $data->trans('country') }} - {{ $data->trans('city') }} - {{ $data->trans('address') }} 
                <i class="fa fa-calendar" aria-hidden="true"></i> {{ $data->start_at }} - {{ $data->end_at }}
            </span>


		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
                <li>@lang('site.getContent',['ar'=>$data->title,'en'=>$data->titleEn])</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section class="pt-15">
	<div class="container">
		
		<div class="row">
		
			<!-- RIGHT -->
			<div class="col-lg-12 col-md-12">
                <ul class="nav nav-tabs nav-top-border">
                    <li class="nav-item"><a class="nav-link active" href="#aboutConference" data-toggle="tab">@lang('site.aboutConference')</a></li>
                    @if($data->details->trans('goals'))
                        <li class="nav-item"><a class="nav-link" href="#goals" data-toggle="tab">@lang('site.goals')</a></li>
                    @endif
                    @if($data->details->trans('conditions'))
                        <li class="nav-item"><a class="nav-link" href="#conditions" data-toggle="tab">@lang('site.conditions')</a></li>
                    @endif
                    @if($data->details->trans('topics'))
                        <li class="nav-item"><a class="nav-link" href="#topics" data-toggle="tab">@lang('site.topics')</a></li>
                    @endif
                    @if($data->details->trans('committee'))
                        <li class="nav-item"><a class="nav-link" href="#committee" data-toggle="tab">@lang('site.committee')</a></li>
                    @endif
                    @if($data->details->trans('speakers'))
                        <li class="nav-item"><a class="nav-link" href="#speakers" data-toggle="tab">@lang('site.speakers')</a></li>
                    @endif
                    @if($data->details->trans('comments'))
                        <li class="nav-item"><a class="nav-link" href="#comments" data-toggle="tab">@lang('site.comments')</a></li>
                    @endif
                    @if($data->details->trans('contact'))
                        <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">@lang('site.contact')</a></li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="aboutConference">
                            @if($data->picture)
                                <figure class="box-shadow-5">
                                    <img class="img-fluid" src="{{ $data->getPicture() }}" />
                                </figure>
                            @endif
                        <p>
                            {!! Lang::get('site.getContent', ['ar'=>$data->txt, 'en'=>$data->txtEn]) !!}
                        </p>
                    </div>
                    @if($data->details->trans('goals'))
                        <div class="tab-pane fade" id="goals">
                            <p>{!! $data->details->trans('goals') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="goals">
                            <p>{!! $data->trans('goals') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('conditions'))
                        <div class="tab-pane fade" id="conditions">
                            <p>{!! $data->details->trans('conditions') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="conditions">
                            <p>{!! $data->trans('conditions') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('topics'))
                        <div class="tab-pane fade" id="topics">
                            <p>{!! $data->details->trans('topics') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="topics">
                            <p>{!! $data->trans('topics') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('committee'))
                        <div class="tab-pane fade" id="committee">
                            <p>{!! $data->details->trans('committee') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="committee">
                            <p>{!! $data->trans('committee') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('speakers'))
                        <div class="tab-pane fade" id="speakers">
                            <p>{!! $data->details->trans('speakers') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="speakers">
                            <p>{!! $data->trans('speakers') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('comments'))
                        <div class="tab-pane fade" id="comments">
                            <p>{!! $data->details->trans('comments') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="comments">
                            <p>{!! $data->trans('comments') !!}</p>
                        </div>
                    @endif
                    @if($data->details->trans('contact'))
                        <div class="tab-pane fade" id="contact">
                            <p>{!! $data->details->trans('contact') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="contact">
                            <p>{!! $data->trans('contact') !!}</p>
                        </div>
                    @endif
                </div>
			</div>
		</div>
		
	</div>
</section>
	
@stop