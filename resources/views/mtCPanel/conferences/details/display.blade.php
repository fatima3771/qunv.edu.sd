@extends('mtCPanel.layouts.master')

@section('php')
    @php        
        $page_title = "conferences_details";
        $parentPage_title = "conferences";
        $childPage = "details";
        $parentPage = "conferences";
        $page = $parentPage.".".$childPage;
        $parent = $data->conference;
    @endphp
@endsection

@section('breadcrumb')
        <li>
            <i class="fa fa-home"></i>
            <a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
        </li>
        <li> <a href="{{ mtGetRoute('index','mtCPanel.'.$parentPage) }}">@lang('admin.'.$parentPage_title)</a> </li>
        <li> <a href="{{ mtGetRoute('show','mtCPanel.'.$parentPage,$parent->id) }}">{{ $parent->title }}</a> </li>
        <li> <a href="{{ mtGetRoute('index','mtCPanel.'.$page,$parent->id) }}">@lang('admin.'.$page_title)</a> </li>
        <li class="active">{{ $data->name }}</li>
@endsection

@section('header-title')
	@lang('admin.'.$page_title)
@endsection


@section('content')
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>@lang('admin.'.$page_title) - @lang('admin.display')</strong> - {{ $parent->title }}
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $parent->id, $data->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-edit white"></i> <span>تعديل</span> </a></li>
                    <li><a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $parent->id, $data->id) }}" data-afterdeleteurl="{{ request()->root() }}/mtCPanel/{{ $parentPage }}/{{ $parent->id }}/{{ $childPage }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-times white"></i> <span>حذف</span> </a></li>
					{{-- <li>
                        <a data-route="{{ route('mtCPanel.'.$page.'.destroy', ['parent_id' => $parent->id, 'id' => $data->id]) }}" 
                                data-afterdeleteurl="{{ request()->root() }}/mtCPanel/{{ $parentPage }}/{{ $parent->id }}/{{ $childPage }}" 
                                class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;">
                                <i class="fa fa-times white"></i> <span>حذف</span>
                        </a>
                    </li> --}}
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-striped nomargin">
                                <tbody>
                                    <tr>
                                        <th width="25%">#</th>
                                        <td>{{ $data->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.txt')</th>
                                        <td>{!! $data->txt !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.txt') (En)</th>
                                        <td>{!! $data->txtEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.goals')</th>
                                        <td>{!! $data->goals !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.goals') (En)</th>
                                        <td>{!! $data->goalsEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.conditions')</th>
                                        <td>{!! $data->conditions !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.conditions') (En)</th>
                                        <td>{!! $data->conditionsEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('site.topics')</th>
                                        <td>{!! $data->topics !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('site.topics') (En)</th>
                                        <td>{!! $data->topicsEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.committee')</th>
                                        <td>{!! $data->committee !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.committee') (En)</th>
                                        <td>{!! $data->committeeEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.speakers')</th>
                                        <td>{!! $data->speakers !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.speakers') (En)</th>
                                        <td>{!! $data->speakersEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.comments')</th>
                                        <td>{!! $data->comments !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.comments') (En)</th>
                                        <td>{!! $data->commentsEn !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
			</div>
		</div>
    </div>
@stop
@section('scripts')
    <script>
        $('.deleteBtn').on('click', function (){
            var route = $(this).data('route');
            var afterdeleteurl = $(this).data('afterdeleteurl');
            Swal.fire({
                title: 'هل أنت متأكد?',
                text: "سوف يتم مسح البيانات!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، قم بعملية المسح!'
            }).then((result) => {
                if(result.value){
                    $.ajax({
                        url: route,
                        type: 'DELETE',
                        dataType: "JSON",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(result) {
                            window.open(afterdeleteurl,'_self');
                        }
                    });
                }
            });
        });
    </script>
	@include('mtCPanel.alerts')
@stop