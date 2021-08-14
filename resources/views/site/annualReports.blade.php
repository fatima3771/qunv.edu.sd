@extends('site.layouts.master')

@section('meta-title')
    @lang('site.annualReportForYear',['year'=>$year]) - 
@endsection

@section('meta-description')
    @lang('site.annualReports')
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
    <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.annualReports')</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.annualReportForYear',['year'=>$year])</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li><a href="{{ route('annualReport', [app()->getLocale()]) }}">@lang('site.annualReports')</a></li>
			<li>@lang('site.annualReports')</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>	

<section>
	<div class="container">
		<div class="row">
            <!-- RIGHT -->
            <div class="col-md-8 col-sm-8">

                    <!-- Subtitle -->
                    <div class="heading-title heading-border">
                        <h2 class="fs-25">@lang('site.annualReportForYear',['year'=>'<span>'.$year.'</span>'])</h2>
    
                        <ul class="list-inline categories m-0">
                            <li><a href="{{ route('annualReport', [app()->getLocale()]) }}">@lang('site.annualReports')</a></li>
                        </ul>
    
                    </div>
                    <!-- /Subtitle -->
                
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img src="{{$report->getImage()}}" class="img-responsive thumbnail" style="width:100%" alt="@lang('site.annualReportForYear',['year'=>$year])" title="@lang('site.annualReportForYear',['year'=>$year])" />
                    </div>
                    <div class="col-md-8 col-sm-8">
                    @if($report->getPDF() != false)
                        <p> {{ __('site.downloadFullReportForTheYear',['year'=>$year]) }}</p>
                        <p>
                            <a target="_blank" href="{{ $report->getPDF() }}" class="btn btn-secondary btn-block">
                                <i class="fa fa-download" aria-hidden="true"></i> @lang('site.reportFullDownload') [ {{ number_format($report->getPDFSize() / 1024 / 1024, 2) }} MB]
                            </a>
                        </p>
                    @endif
                    <p>
                        {{ __('site.downloadPartOfReport') }}
                    </p>
                </div>
                </div>
    
                @if($report->details->count() > 0)

                    <table class="table table-striped table-condensed table-hover">
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($report->details as $rd)
                                @if($rd->getPDF())
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>@lang('site.getContent', ['ar'=>$rd->title, 'en'=>$rd->titleEn])</td>
                                        <td>
                                            <span class="badge badge-primary">
                                                {{ number_format($rd->getPDFSize() / 1024) }} KB
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ $rd->getPDF() }}" target="_blank" class="btn btn-primary btn-sm">
                                                <i class="fa fa-fw fa-download"></i>
                                                @lang('site.download')
                                            </a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot>
                            @if($i == 1)
                                <tr>
                                    <td colspan="3">
                                        <div class="alert alert-warning" role="alert">
                                            {{ __('site.noData') }}
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tfoot>
                    </table>

                @endif

            </div>

			<!-- LEFT -->
			<div class="col-md-4 col-sm-4">

                <div class="side-nav mb-60">

<!-- RELATED -->
<div class="heading-title heading-border mt-60">
    <h3>@lang('site.previousReports') </h3>
</div>
                    @php $lastReport = App\AnnualReport::orderBy('year','DESC')->first(); @endphp
                        @for($y = $lastReport->year; $y >= 2005; $y--)
                            <a href="{{ route('annualReport', [app()->getLocale(), $y]) }}" class="tag">
                                <span class="txt">
                                    {{ $y }}
                                </span>
                                <span class="num"><i class="fa fa-fw fa-external-link"></i></span>
                            </a>
                        @endfor

                    {{-- <ul class="list-group list-group-bordered list-group-noicon uppercase">
                        @php $lastReport = App\AnnualReport::orderBy('year','DESC')->first(); @endphp
                            @for($y = $lastReport->year; $y >= 2005; $y--)
                            <li class="list-group-item"> <a href="{{ route('annualReport', [app()->getLocale(), $y]) }}" class="form-control">@lang('site.annualReportForYear',['year'=>$y])</a> </li>
                        @endfor
                    </ul> --}}

                </div>

                <div class="divider double-line"><!-- divider --></div>

                <!-- 
                    RELATED CAROUSEL 

                    controlls-over		= navigation buttons over the image 
                    buttons-autohide 	= navigation buttons visible on mouse hover only

                    owl-carousel item paddings
                        .owl-padding-0
                        .owl-padding-1
                        .owl-padding-2
                        .owl-padding-3
                        .owl-padding-6
                        .owl-padding-10
                        .owl-padding-15
                        .owl-padding-20
                -->
                <div class="text-center">
                    <div class="owl-carousel owl-padding-1 m-0 buttons-autohide controlls-over" data-plugin-options='{"singleItem": false, "items": "2", "autoPlay": 3500, "navigation": true, "pagination": false}'>

                        @foreach( App\AnnualReport::orderBy('year','DESC')->get() as $otherReport)
                            <!-- item -->
                            <div class="item-box">
                                <figure>
                                    <span class="item-hover">
                                        <span class="overlay dark-5"></span>
                                        <span class="inner">

                                            {{-- <!-- lightbox -->
                                            <a class="ico-rounded lightbox" href="{{ $otherReport->getImage() }}" data-plugin-options='{"type":"image"}'>
                                                <span class="fa fa-plus fs-20"></span>
                                            </a> --}}

                                            <!-- details -->
                                            <a class="ico-rounded" href="{{ $otherReport->getLink() }}">
                                                <span class="glyphicon glyphicon-option-horizontal fs-20"></span>
                                            </a>

                                        </span>
                                    </span>

                                    <img class="img-fluid" src="{{ $otherReport->getImage() }}" width="600" height="399" alt="">
                                </figure>

                                <div class="item-box-desc">
                                    <h3>@lang('site.annualReportForYear',['year'=>'<span>'.$otherReport->year.'</span>'])</h3>
                                </div>

                            </div>
                            <!-- /item -->
                        @endforeach
                    </div>
                </div>

				{{-- @include('site.newsMenu') --}}

			</div>	

		</div><!-- /.row -->           
	</div><!-- /.container -->   
</section>  

@stop