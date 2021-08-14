<div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed2">
        <div class="container">
            <nav id="menuzord" class="menuzord default" style="border: 1px solid #DDD;">
                <ul class="menuzord-menu">
                    <li>
                        <a class="fs-16" href="{{Request::root()}}/">
                            {{Lang::get('site.universityHome')}}
                        </a>
                    </li>
                    <li>
                        <a class="fs-16" href="{{ route('slug', [app()->getLocale(), $college->slug]) }}">
                            @lang('site.collegeHome',['ar'=>$college->type->titleSingle, 'en'=>$college->type->titleSingleEn])
                        </a>
                    </li>
                    <li>
                        <a class="fs-16 dropdown-toggle" href="javascript: return(0);">
                            @lang('site.aboutCollege',['ar'=>$college->type->titleSingle, 'en'=>$college->type->titleSingleEn])
                        </a>
                        <ul class="dropdown">
                            <li>
                                <a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'about']) }}">@lang('site.aboutCollege',['ar'=>$college->type->titleSingle, 'en'=>$college->type->titleSingleEn])</a>
                            </li>
                            <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'vision-mission-objectives']) }}">@lang('site.VMO')</a></li>
                            @if(in_array($college->type->id,[1,8,9]) && $college->hasDetails('deanWord'))
                                <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'dean']) }}">@lang('site.getContent',['ar'=>$college->type->deanshipWordTitle, 'en'=>$college->type->deanshipWordTitleEn])</a></li>
                            @endif
                            @if(in_array($college->type->id,[1,8,9]) && $college->hasDetails('regulations'))
                                <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'regulations']) }}">@lang('site.regulations')</a></li>
                            @endif
                            @if(in_array($college->type->id,[1,8,9]) && $college->hasDetails('programs'))
                                <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'programs']) }}">@lang('site.programs')</a></li>
                            @endif
                            @if(in_array($college->type->id,[1,8,9]) && $college->hasDetails('calendar'))
                                <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'calendar']) }}">@lang('site.calendar')</a></li>
                            @endif
                            @if(in_array($college->type->id,[1,8,9]) && $college->hasDetails('admission'))
                                <li><a class="fs-14" href="{{ route('slug', [app()->getLocale(), $college->slug, 'admission']) }}">@lang('site.admission')</a></li>
                            @endif
                        </ul>
                    </li>
                    @if($college->departments->count() > 0)
                        <li  class="fs-16">
                            <a href="javascript: return(0);" class="dropdown-toggle">@lang('site.departments')</a>
                            <ul class="dropdown">
                                @foreach ($college->departments as $dept)
                                    <li><a class="fs-14" href="{{$dept->getUrl()}}">@lang('site.getContent',['ar'=>$dept->title,'en'=>$dept->titleEn])</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                    @if($college->news->count() > 0)
                        <li><a class="fs-16" href="{{ route('slug', [app()->getLocale(), $college->slug, 'news']) }}">@lang('site.collegeNews',['ar'=>$college->type->titleSingle, 'en'=>$college->type->titleSingleEn])</a></li>
                    @endif
                    @if($college->announcements->count() > 0)
                        <li><a class="fs-16" href="{{ route('slug', [app()->getLocale(), $college->slug, 'announcements']) }}">@lang('site.collegeAnnouncements',['ar'=>$college->type->titleSingle, 'en'=>$college->type->titleSingleEn])</a></li>
                    @endif
                    @if($college->type->display_staff == 1)
                        @if($college->staff->count() > 0)
                            <li><a class="fs-16" href="{{ route('slug', [app()->getLocale(), $college->slug, 'staff']) }}">@lang('site.staff')</a></li>
                        @endif
                    @endif
                    @if($college->type->display_prof == 1)
                        @if($college->professors->count() > 0)
                            <li><a class="fs-16" href="{{ route('slug', [app()->getLocale(), $college->slug, 'prof']) }}">@lang('site.professors')</a></li>
                        @endif
                    @endif
                    {{-- @if($college->type->display_students == 1)
                        <li><a href="{{Request::root()}}/{{$college->slug}}/students">@lang('site.students')</a></li>
                    @endif --}}
                    @if($college->extraDetails->count() > 0)
                        <li>
                            <a class="fs-16" href="javascript: return(0);" class="dropdown-toggle">{{Lang::get('site.more')}}</a>
                            <ul class="dropdown">
                                @foreach ($college->extraDetails as $ed)
                                    <li><a class="fs-14" href="{{Request::root()}}/{{$college->slug}}/content/{{$ed->id}}">@lang('site.getContent',['ar'=>$ed->title,'en'=>$ed->titleEn])</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
                </ul>
            </nav><!-- /.navbar collapse-->
       </div><!-- /.container -->
    </div>
</div>