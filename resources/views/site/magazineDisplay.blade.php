@php 
	$lang = \Lang::get('site.getContent', ['ar' => 1, 'en' => 2]);
	$latestNews = App\News::where('lang',$lang)->orderBy('created_at','DESC')->limit(3)->get();
@endphp
@extends('site.layouts.master')

@section('meta-title')
	{{ $magazine->trans('title') }} - 
@endsection

@section('meta-description')
@endsection
	
@section('content')


<section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
	<div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

	<div class="container">

		<h1>{{ $magazine->trans('title') }}</h1>
		<span class="font-lato1 fs-18 fw-300">@lang('site.magazines')</span>

		<!-- breadcrumbs -->
		<ol class="breadcrumb">
			<li class="home"><i class="fa fa-home"></i> <a href="{{ route('home', [app()->getLocale()]) }}">@lang('site.home')</a></li>
			<li ><a href="{{ route('magazines',[app()->getLocale()]) }}">@lang('site.magazines')</a></li>
			<li class="active">{{ $magazine->trans('title') }}</li>
		</ol><!-- /breadcrumbs -->

	</div>
</section>

<section class="pt-15">
	<div class="container">
		
		<div class="row">
		
			<!-- RIGHT -->

			<div class="col-lg-9 col-md-9 order-sm-2 order-md-2 order-lg-2">
				{{-- <div class="heading-title heading-border">
					<h2><span>@lang('site.staff')</span></h2>	
				</div> --}}

                <ul class="nav nav-tabs nav-top-border">
                    <li class="nav-item"><a class="nav-link active" href="#aboutMagazine" data-toggle="tab">@lang('site.aboutMagazine')</a></li>
                    @if($magazine->trans('publishConditions'))
                        <li class="nav-item"><a class="nav-link" href="#publishConditions" data-toggle="tab">@lang('site.publishConditions')</a></li>
                    @endif
                    @if($magazine->trans('editorialBoard'))
                        <li class="nav-item"><a class="nav-link" href="#editorialBoard" data-toggle="tab">@lang('site.editorialBoard')</a></li>
                    @endif
                    @if($magazine->issues()->count() > 0)
                        <li class="nav-item"><a class="nav-link" href="#issues" data-toggle="tab">@lang('site.issues')</a></li>
                    @endif
                    @if($magazine->trans('contact'))
                        <li class="nav-item"><a class="nav-link" href="#contactUs" data-toggle="tab">@lang('site.contactUs')</a></li>
                    @endif
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane active" id="aboutMagazine">
                            @if($magazine->picture)
                                <figure class="box-shadow-5">
                                    <img class="img-fluid" src="{{ $magazine->getPicture() }}" />
                                </figure>
                            @endif
                        <p>
                            {!! Lang::get('site.getContent', ['ar'=>$magazine->txt, 'en'=>$magazine->txtEn]) !!}
                        </p>
                    </div>
                    @if($magazine->trans('publishConditions'))
                        <div class="tab-pane fade" id="publishConditions">
                            <p>{!! $magazine->trans('publishConditions') !!}</p>
                        </div>
                        <div class="tab-pane fade" id="editorialBoard">
                            <p>{!! $magazine->trans('editorialBoard') !!}</p>
                        </div>
                    @endif
                    @if($magazine->issues()->count() > 0)
                        <div class="tab-pane fade" id="issues">
                            @foreach($magazine->issues()->orderBy('id','desc')->get() as $issue)
                                <div class="clearfix search-result"><!-- item -->
                                    <h4 class="mb-0"><a href="{{ $issue->getUrl() }}">{{ $issue->trans('title') }}</a></h4>
                                    <small class="text-muted">{{ $issue->published_at }}</small>
                                    @if($issue->picture)
                                        <img style="float:right; margin-left:10px; margin-top:6px;" src="{{ $issue->getPicture() }}" alt="" height="60">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if($magazine->trans('contact'))
                        <div class="tab-pane fade" id="contactUs">
                            <p>{!! $magazine->trans('contact') !!}</p>
                        </div>
                    @endif
                </div>

			</div>



			<!-- LEFT -->
			<div class="col-md-3 col-sm-3">

                <div>
                    <p>
                    يمكنك البحث في هيئة التدريس من هنا، فقط قم بكتابة الاسم ثم اضغط على بحث:
                    </p><form method="GET" action="" accept-charset="UTF-8">
                        {{-- <input name="_token" type="hidden" value="wz3ac7ZDataloiBYHir8DRMDFdepK6cmiCJA2Gq9"> --}}
                        <input class="form-control" placeholder="كلمات البحث" name="keywords" type="text" value="">
                            <br>
                            <input class="btn btn-md btn-success" type="submit" value="ابحث">
                            <a href="http://delta.edu.sd/staff"> استعراض الكل </a>
                            </form>
                </div>

				{{-- @include('site.newsMenu') --}}

				<!-- FACEBOOK -->
				{{-- <iframe class="hidden-xs-down" src="//www.facebook.com/plugins/likebox.php?href=@lang('site.facebookUrl')/&amp;width=263&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:263px; height:258px;"></iframe> --}}


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