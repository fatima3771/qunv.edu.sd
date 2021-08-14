@extends('mtCPanel.layouts.master')

@section('php')
    @php
        $page = "polls";
    @endphp
@endsection

@section('breadcrumb')
		<li>
			<i class="fa fa-home"></i>
			<a href="{{  request()->root() }}/mtCPanel">@lang('admin.cpanel')</a>
		</li>
		<li>
			<a href="{{  mtGetRoute('index','mtCPanel.'.$page) }}">@lang('admin.'.$page)</a>
		</li>
		<li class="active">@lang('admin.display')</li>
@endsection

@section('header-title')
	@lang('admin.'.$page)
@endsection


@section('content')
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>@lang('admin.'.$page) - @lang('admin.display')</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $data->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-edit white"></i> <span>تعديل</span> </a></li>
					<li><a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $data->id) }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-times white"></i> <span>حذف</span> </a></li>
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
                                <th>@lang('admin.start_date')</th>
                                <td>{{ $data->start_date }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.end_date')</th>
                                <td>{{ $data->end_date }}</td>
                            </tr>
                            <tr>
                                <th>@lang('admin.status')</th>
                                <td>
                                    @if($data->publish == 1) 
                                    <span class="label label-success"> <i class="fa fa-eye" aria-hidden="true"></i> منشور </span> 
                                    @else 
                                    <span class="label label-warning"> <i class="fa fa-eye-slash" aria-hidden="true"></i> غير منشور </span> 
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>@lang('admin.polls_answers')</th>
                                <td><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.answers',$data->id) }}"> انقر هنا </a></td>
                            </tr>
						</tbody>
						<tfoot>
							<tr>
                                <th>@lang('admin.control')</th>
                                <td>
                                    <a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $data->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>تعديل</span> </a>
                                    <a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $data->id) }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal"><i class="fa fa-times white"></i> <span>حذف</span> </a>
                                </td>
                            </tr>

						</tfoot>
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
            if(confirm('سوف يتم حذف هذا السجل، هل أنت موافق؟')){
                $.ajax({
                    url: route,
                    type: 'DELETE',
                    dataType: "JSON",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(result) {
                        window.open('{{ request()->root() }}/mtCPanel/{{ $page }}','_self');
                    }
                });
            }
        });
    </script>
	@include('mtCPanel.alerts')
@stop