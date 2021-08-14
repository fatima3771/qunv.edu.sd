@if($mostReadNews->count() > 0 && $latestNews->count() > 0)

<div class="widget">
    <h5 class="widget-title line-bottom">@lang('site.latestNews')</h5>
    <div class="latest-posts">
        @foreach($mostReadNews as $mrNews)
            <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="{{ $mrNews->getURL() }}"><img src="{{ $mrNews->getPicture() }}" alt=""></a>
                <div class="post-right">
                <h5 class="post-title mt-0"><a href="{{ $mrNews->getURL() }}">{{$mrNews->title}}</a></h5>
                <p>{{ $mrNews->getDate() }}</p>
                </div>
            </article>
        @endforeach
    </div>
  </div>

@endif