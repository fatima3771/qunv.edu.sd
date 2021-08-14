@extends('mtCPanel.layouts.master')

@section('php')
    @php        
        $page_title = "issues_topics";
        $parentPage_title = "issues";
        $gParentPage_title = "magazines";
        $childPage = "magazines.issues.topics";
        $parentPage = "magazines.issues";
        $gParentPage = "magazines";
        $page = $childPage;
        $parent = $data->issue;
    @endphp
@endsection

@section('breadcrumb')
        <li>
            <i class="fa fa-home"></i>
            <a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
        </li>
		<li> <a href="{{ mtGetRoute('index','mtCPanel.'.$gParentPage) }}">@lang('admin.'.$gParentPage_title)</a> </li>
		<li> <a href="{{ mtGetRoute('show','mtCPanel.'.$gParentPage,$gParent->id) }}">{{ $gParent->title }}</a></li>
		<li> <a href="{{ mtGetRoute('index','mtCPanel.'.$parentPage,$gParent->id) }}">@lang('admin.'.$parentPage_title)</a> </li>
		<li> <a href="{{ mtGetRoute('show','mtCPanel.'.$parentPage,$gParent->id,$parent->id) }}">{{ $parent->title }}</a> </li>
        <li class="active">@lang('admin.display')</li>
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
					<li><a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $gParent->id, $parent->id, $data->id ) }}" class="btn btn-warning btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-edit white"></i> <span>تعديل</span> </a></li>
					<li>
                        @if(auth()->guard('admin')->user()->hasActionPriv('magazines','delete'))
                            <a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $gParent->id, $parent->id, $data->id) }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-times white"></i> <span>حذف</span> </a>
                        @endif
                    </li>
				</ul>
				<!-- /right options -->

			</div>

			<!-- panel content -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped nomargin">
						<tbody>
                            <tr>
                                <th width="15%">#</th>
                                <td>{{ $data->id }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.title')</th>
                                <td>{{ $data->title }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.titleEn')</th>
                                <td>{{ $data->titleEn }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.author')</th>
                                <td>{{ $data->author }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.authorEn')</th>
                                <td>{{ $data->authorEn }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.abstract')</th>
                                <td>{{ $data->abstract }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.abstractEn')</th>
                                <td>{{ $data->abstractEn }}</td>
                            </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
    </div>
@stop
@section('scripts')
    <script>
        $('.deleteBtn').on('click', function (){
		var route = $(this).data('route');
		Swal.fire({
			title: 'هل أنت متأكد?',
			text: "سوف يتم مسح البيانات!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'نعم، قم بعملية المسح!'
			}).then((result) => {
			if (result.value) {
				$.ajax({
					url: route,
					type: 'DELETE',
					dataType: "JSON",
					data: {
						"_token": "{{ csrf_token() }}"
					},
					success: function(result) {
						window.open('{{ mtGetRoute("index","mtCPanel.".$page,$gParent->id, $parent->id) }}','_self');
					}
				});
			}
		})
	});
    </script>
	@include('mtCPanel.alerts')
@stop