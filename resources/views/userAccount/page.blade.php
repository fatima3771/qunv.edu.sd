@extends('userAccount.layouts.master')
@section('content')
<div id="fh5co-about-us" data-section="about" style="background:url({{ asset('public/assets/crew/images/pageBG.jpg') }}) no-repeat;">
    <div class="container page-banner">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <ol class="breadcrumb" style="border:1px rgba(0,0,0,0.2) solid;">
                    <li><a href="index.html">@lang('site.home')</a></li>
                    <li><a href="">@lang('site.aboutProgram')</a></li>
                    <li class="active">@lang('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn])</li>
                </ol>
            </div>
        </div>
    </div>
	<div class="container">
		<div class="row row-bottom-padded-lg" id="about-us">
			{!! $page->txt !!}
		</div>
	</div>
</div>
@stop