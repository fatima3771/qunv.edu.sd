<?php $pages = App\Page::where('parent_id',0)->where('publish',1)->orderBy('order','ASC')->get(); ?>
<div class="header-nav">
    <div class="header-nav-wrapper navbar-scrolltofixed2">
        <div class="container">
            <nav id="menuzord" class="menuzord default" style="border: 1px solid #DDD;">
                <ul class="menuzord-menu">
                    @foreach($pages as $page)
                        <li>
                            <a class="fs-16 @if($page->hasChild() || in_array($page->id,[13,14,32,45])) javascript:void(0) dropdown-toggle @endif" href="@if($page->hasChild()) javascript:void(0) @else {{$page->getLink()}} @endif">
                                {{Lang::get('site.getContent',['ar'=>$page->title,'en'=>$page->titleEn])}}
                            </a>
                            @if($page->hasChild())
                                <ul class="dropdown">
                                    @foreach($page->children as $children)
                                        <li>
                                            <a @if(!$children->hasChild()) href="{{$children->getLink()}}" class="fs-14"  @else class="fs-14 dropdown-toggle" @endif>
                                                {{Lang::get('site.getContent',['ar'=>$children->title,'en'=>$children->titleEn])}}</a>
                                            @if($children->hasChild())
                                                <ul class="dropdown-menu">
                                                    @foreach($children->children as $child)
                                                        <li><a class="fs-14" href="{{$child->getLink()}}">{{Lang::get('site.getContent',['ar'=>$child->title,'en'=>$child->titleEn])}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif            
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($page->id == 13)
                                <ul class="dropdown">
                                    @foreach(App\College::where('colleges_type_id',1)->orderBy('colleges_type_id','asc')->get() as $menuCollege)
                                        <li>
                                            <a href="{{$menuCollege->getUrl()}}" class="fs-14">
                                                @lang('site.getContent',['ar'=>$menuCollege->title,'en'=>$menuCollege->titleEn])
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($page->id == 14)
                                <ul class="dropdown">
                                    @foreach(App\College::where('colleges_type_id',4)->orderBy('colleges_type_id','asc')->get() as $menuCollege)
                                        <li>
                                            <a href="{{$menuCollege->getUrl()}}" class="fs-14">
                                                @lang('site.getContent',['ar'=>$menuCollege->title,'en'=>$menuCollege->titleEn])
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($page->id == 32)
                                <ul class="dropdown">
                                    @foreach(App\College::where('colleges_type_id',2)->orderBy('colleges_type_id','asc')->get() as $menuCollege)
                                        <li>
                                            <a href="{{$menuCollege->getUrl()}}" class="fs-14">
                                                @lang('site.getContent',['ar'=>$menuCollege->title,'en'=>$menuCollege->titleEn])
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            @if($page->id == 45)
                                <ul class="dropdown">
                                    @foreach(App\College::where('colleges_type_id',3)->orderBy('colleges_type_id','asc')->get() as $menuCollege)
                                        <li>
                                            <a href="{{$menuCollege->getUrl()}}" class="fs-14">
                                                @lang('site.getContent',['ar'=>$menuCollege->title,'en'=>$menuCollege->titleEn])
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>