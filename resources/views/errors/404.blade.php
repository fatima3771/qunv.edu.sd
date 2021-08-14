@extends('site.layouts.master')

@section('content')

    <section class="page-header parallax parallax-3" style="background-image:url('{{ request()->root() }}/public/images/headerBg.jpg')">
        <div class="overlay dark-5"><!-- dark overlay [1 to 9 opacity] --></div>

        <div class="container">

            <h1>@lang('site.pageNotFound')</h1>
            <span class="font-lato1 fs-18 fw-300"></span>

            <!-- breadcrumbs -->
            <ol class="breadcrumb">
                <li class="home"><i class="fa fa-home"></i> <a href="{{ request()->root() }}/">@lang('site.home')</a></li>
                <li>@lang('site.pageNotFound')</li>
            </ol><!-- /breadcrumbs -->

        </div>
    </section>

    <section class="section-xlg">
        <div class="container">
            
            <div class="row">

                <div class="col-md-6 col-sm-6 hidden-xs-down">
                    
                    <div class="error-404">
                        404
                    </div>
                
                </div>

                <div class="col-md-6 col-sm-6">
                
                    <h3 class="m-0">@lang('site.pageNotFoundTxt')</h3>
                    {{-- <p class="mt-0 fs-20 font-lato text-muted">Please, search again using more specific keywords.</p>

                    <!-- INLINE SEARCH -->
                    <div class="inline-search clearfix mb-60">
                        <form action="" method="get" class="widget_search">
                            <input type="search" placeholder="Search..." id="s" name="s" class="serch-input">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            <div class="clear"></div>
                        </form>
                    </div>
                    <!-- /INLINE SEARCH --> --}}

                    <div class="divider mb-0"><!-- divider --></div>

                    <a class="fs-16 font-lato1" href="{{ request()->root() }}"><i class="glyphicon glyphicon-menu-left mr-10 fs-12"></i> @lang('site.backToHomepage')</a>

                </div>

            </div>
            
        </div>
    </section>

@stop