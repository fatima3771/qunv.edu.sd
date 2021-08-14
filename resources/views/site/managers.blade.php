@extends('site.layouts.master')

@section('meta-title')
    @lang('site.getContent',['ar'=>$section->title,'en'=>$section->titleEn]) - 
@endsection

@section('meta-description')
    @lang('site.getContent',['ar'=>$section->title,'en'=>$section->titleEn])
@endsection

@section('content')

<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>@lang('site.getContent',['ar'=>$section->title,'en'=>$section->titleEn])</h1>
		<span class="font-lato1 fs-18 fw-300"></span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li><a>@lang('site.aboutUs')</a></li>
			<li>@lang('site.getContent',['ar'=>$section->title,'en'=>$section->titleEn])</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section>
	<div class="container">
	
		<div class="row">
            <!-- RIGHT -->
			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">

                <div class="heading-title heading-border">
                    <h2><span>@lang('site.getContent',['ar'=>$section->title,'en'=>$section->titleEn])</span></h2>
                </div>

                @php
                    $i = 0;
                @endphp
                @foreach($section->managers as $manager)
                @php
                    switch($section->id){
                        case 1: $grid = 12;
                        break;
                        case 2: $grid = 12;
                        break;
                        case 3: $grid = 4;
                        break;
                        case 4: $grid = 4;
                        break;
                    }    
                @endphp
                    <div class="col-sm-12 col-md-{{ $grid }}">
                        <div class="thumbnail">
                            <img class="img-fluid" src="{{ $manager->getPicture() }}" alt="">
                            <div class="caption">
                                <h4 class="m-0">@lang('site.getContent', ['ar'=>$manager->name,'en'=>$manager->nameEn])
                                <br><small class="mb-20 block">@lang('site.getContent', ['ar'=>$manager->title,'en'=>$manager->titleEn])</small>
                                </h4>

                                @if($manager->facebook_url)
                                    <a href="{{ $manager->facebook_url }}" target="_blank" class="social-icon social-icon-sm social-facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if($manager->twitter_url)
                                    <a href="{{ $manager->twitter_url }}" target="_blank" class="social-icon social-icon-sm social-twitter">
                                        <i class="fa fa-twitter"></i>
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                @endif
                                @if($manager->linkedin_url)
                                    <a href="{{ $manager->linkedin_url }}" target="_blank" class="social-icon social-icon-sm social-linkedin">
                                        <i class="fa fa-linkedin"></i>
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if(++$i % (12/$grid) == 0)
                        <div class="clearfix"></div>
                    @endif
                @endforeach

        </div>
        <!-- LEFT -->
			<div class="col-md-3 col-sm-3">
                <div class="side-nav mb-60 mt-30">

                    <div class="side-nav-head">
                        <button class="fa fa-bars"></button>
                        <h4>@lang('site.executiveManagers')</h4>
                    </div>
                    <ul class="list-group list-group-bordered list-group-noicon uppercase">
                        @foreach(App\ManagerType::get() as $mType)
                            {{-- <li class="list-group-item"><a href="#"><span class="fs-11 text-muted float-right">(32)</span> NEW</a></li> --}}
                            <li class="list-group-item"><a href="../managers/{{ $mType->id }}">@lang('site.getContent',['ar'=>$mType->title,'en'=>$mType->titleEn])</a></li>
                        @endforeach
                    </ul>
                </div>

				<!-- FACEBOOK -->
				<iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/fibsudan1/&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe>


				<hr>


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