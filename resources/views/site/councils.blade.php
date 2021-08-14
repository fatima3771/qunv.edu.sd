@extends('site.layouts.master')

@section('meta-title')
    @if($year) @lang('site.councilForYear',['year'=>$year]) @else @lang('site.council') @endif - 
@endsection

@section('meta-description')
    @lang('site.council')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.council')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.aboutUs')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li>@lang('site.aboutUs')</li>
			<li class="active">@lang('site.council')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
	<div class="container">
	
		<div class="row">
            @php
                $i = 0;
                $j = 0;
                $grid = 4;
                $lastCouncil = App\Council::orderBy('year','DESC')->first();
            @endphp

            @if($year != $lastCouncil->year)            
                <!-- RIGHT -->
                <div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">

                    <div class="heading-title heading-border">
                        <h2>@lang('site.councilForYear',['year'=>'<span>'.$year.'</span>'])</h2>
                    </div>
                    <table class="table table-striped table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>م</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.councilTitle')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($councils as $c)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>@lang('site.getContent', ['ar'=>$c->name, 'en'=>$c->nameEn])</td>
                                    <td>@lang('site.getContent', ['ar'=>$c->title, 'en'=>$c->titleEn])</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <!-- RIGHT -->
                <div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
                    <div class="heading-title heading-border">
                        <h2>@lang('site.council')</h2>
                    </div>

                    @foreach($councils as $c)
                        <div class="col-sm-12 col-md-{{ $grid }}">
                            <div class="thumbnail">
                                <img class="img-fluid" src="{{ $c->getPicture() }}" alt="">
                                <div class="caption">
                                    <h4 class="m-0">@lang('site.getContent', ['ar'=>$c->name, 'en'=>$c->nameEn])
                                    <br><small class="mb-20 block">@lang('site.getContent', ['ar'=>$c->title, 'en'=>$c->titleEn])</small>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        @if(++$j % (12/$grid) == 0)
                            <div class="clearfix"></div>
                        @endif
                    @endforeach
                </div>
            @endif
        <!-- LEFT -->
			<div class="col-md-3 col-sm-3">
                <div class="side-nav mb-60 mt-30">
                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>@lang('site.previousCouncil')</h4>
                    </div>
                    @for($y = $lastCouncil->year; $y >= 1979; $y--)
                        <div class="col-md-6" style="padding:1px;">
                        <a href="{{ route('council', [ app()->getLocale(), $y ]) }}" class="form-control">{{$y}}</a>
                        </div>
                    @endfor
                </div>


				<!-- SOCIAL ICONS -->
				{{-- <div class="hidden-xs-down mt-30 mb-60">
					<a href="https://www.facebook.com/sudaneseptn/" class="social-icon social-icon-border social-facebook float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
						<i class="icon-facebook"></i>
						<i class="icon-facebook"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-twitter float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter">
						<i class="icon-twitter"></i>
						<i class="icon-twitter"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-gplus float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google plus">
						<i class="icon-gplus"></i>
						<i class="icon-gplus"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-linkedin float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Linkedin">
						<i class="icon-linkedin"></i>
						<i class="icon-linkedin"></i>
					</a>

					<a href="#" class="social-icon social-icon-border social-rss float-left" data-toggle="tooltip" data-placement="top" title="" data-original-title="Rss">
						<i class="icon-rss"></i>
						<i class="icon-rss"></i>
					</a>
				</div> --}}

			</div>	
		</div>

	</div>
</section>
	
@stop