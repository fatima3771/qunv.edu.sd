@extends('mtCPanel.layouts.master')

@section('php')
    @php
        $page = "colleges";
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
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'details', $data->id) }}" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-exclamation white"></i> <span> @lang('admin.colleges_details') </span> </a></li>
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'extraContents', $data->id) }}" class="btn btn-info btn-xs btn-3d btn-reveal"><i class="fa fa-list white"></i> <span> @lang('admin.colleges_extraContents') </span> </a></li>
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'departments', $data->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal"><i class="fa fa-square-o white"></i> <span> @lang('admin.colleges_departments') </span> </a></li>
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'staff', $data->id) }}" class="btn btn-danger btn-xs btn-3d btn-reveal"><i class="fa fa-user white"></i> <span> @lang('admin.colleges_staff') </span> </a></li>
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'news', $data->id) }}" class="btn btn-success btn-xs btn-3d btn-reveal"><i class="fa fa-quote-left white"></i> <span> @lang('admin.colleges_news') </span> </a></li>
                    <li><a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'slider', $data->id) }}" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-picture-o white"></i> <span> @lang('admin.colleges_slider') </span> </a></li>

					{{-- <li><a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $data->id) }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal" style="margin-right:10px; margin-left:10px; padding:0px 20px;"><i class="fa fa-times white"></i> <span>حذف</span> </a></li> --}}
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
                                        <th width="20%">#</th>
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
                                        <th>@lang('admin.slug')</th>
                                        <td>{{ $data->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.category')</th>
                                        <td>{{  $data->type->title  }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.details')</th>
                                        <td>{!! $data->txt !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.detailsEn')</th>
                                        <td>{!! $data->txtEn !!}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.picture')</th>
                                        <td><img src="{{ $data->getPicture() }}" class="img-responsive thumbnail" /></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>@lang('admin.control')</th>
                                        <td>
                                            <a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $data->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>تعديل</span> </a>
                                            {{-- <a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $data->id) }}" class="deleteBtn btn btn-danger btn-xs btn-3d btn-reveal"><i class="fa fa-times white"></i> <span>حذف</span> </a> --}}
                                        </td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img src="{{ $data->getPicture() }}" class="img-responsive thumbnail">
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
							window.open('{{ request()->root() }}/mtCPanel/{{ $page }}','_self');
						}
					});
				}
			})
		});
	</script>
	@include('mtCPanel.alerts')
@stop