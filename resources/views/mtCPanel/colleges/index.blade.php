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
		<li class="active">@lang('admin.'.$page)</li>
@endsection

@section('header-title')
	@lang('admin.'.$page)
@endsection


@section('content')
	<div class="row">
		<div id="panel-1" class="panel panel-default">
			<div class="panel-heading">
				<span class="title elipsis">
					<strong>@lang('admin.'.$page)</strong> <!-- panel title -->
				</span>

				<!-- right options -->
				<ul class="options pull-left list-inline">
					<li><a href="#" class="opt panel_colapse" data-toggle="tooltip" title="Colapse" data-placement="bottom"></a></li>
					<li><a href="#" class="opt panel_fullscreen hidden-xs" data-toggle="tooltip" title="Fullscreen" data-placement="bottom"><i class="fa fa-expand"></i></a></li>
					<li><a href="{{ mtGetRoute('create','mtCPanel.'.$page) }}" class="btn btn-xs btn-primary"> <i class="fa fa-plus" aria-hidden="true"></i> @lang('admin.addNewItem') </a></li>
				</ul>
				<!-- /right options -->

			</div>

			<div class="panel-body">
				<div class="table-responsive">
					{{ $data->links() }}
					<table class="table table-striped table-bordered table-hover nomargin">
						<thead>
							<tr>
								<th>#</th>
								<th>@lang('admin.category')</th>
								<th>@lang('admin.title')</th>
								<th>@lang('admin.titleEn')</th>
								<th>@lang('admin.slug')</th>
								<th>@lang('admin.departments')</th>
								<th>@lang('admin.control')</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $d)
								<tr>
									{{-- <td>{{ str_pad( $d->id , 8, '0', STR_PAD_LEFT) }}</td> --}}
									<td>{{ $d->id }}</td>
									<td>{{ $d->type->title }}</td>
									<td>{{ $d->title }}</td>
									<td>{{ $d->titleEn }}</td>
									<td>{{ $d->slug }}</td>
									<td>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'details', $d->id) }}" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-exclamation white"></i> <span> @lang('admin.colleges_details') </span> </a>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'extraContents', $d->id) }}" class="btn btn-info btn-xs btn-3d btn-reveal"><i class="fa fa-list white"></i> <span> @lang('admin.colleges_extraContents') </span> </a>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'departments', $d->id) }}" class="btn btn-warning btn-xs btn-3d btn-reveal"><i class="fa fa-square-o white"></i> <span> @lang('admin.colleges_departments') </span> </a>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'staff', $d->id) }}" class="btn btn-danger btn-xs btn-3d btn-reveal"><i class="fa fa-user white"></i> <span> @lang('admin.colleges_staff') </span> </a>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'news', $d->id) }}" class="btn btn-success btn-xs btn-3d btn-reveal"><i class="fa fa-quote-left white"></i> <span> @lang('admin.colleges_news') </span> </a>
										<a href="{{ mtGetRoute('index','mtCPanel.'.$page.'.'.'slider', $d->id) }}" class="btn btn-primary btn-xs btn-3d btn-reveal"><i class="fa fa-picture-o white"></i> <span> @lang('admin.colleges_slider') </span> </a>
									</td>
									<td width="25%">
										<a href="{{ mtGetRoute('show','mtCPanel.'.$page, $d->id) }}" class="btn btn-aqua btn-xs btn-3d btn-reveal"><i class="fa fa-eye white"></i> <span>??????</span> </a>
										<a href="{{ mtGetRoute('edit','mtCPanel.'.$page, $d->id) }}" class="btn btn-yellow btn-xs btn-3d btn-reveal"><i class="fa fa-edit white"></i> <span>??????????</span> </a>
										{{-- <a data-route="{{ mtGetRoute('destroy','mtCPanel.'.$page, $d->id) }}" class="deleteBtn btn btn-red btn-xs btn-3d btn-reveal"><i class="fa fa-times white"></i> <span>??????</span> </a> --}}
									</td>
								</tr>
							@endforeach
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
					title: '???? ?????? ???????????',
					text: "?????? ?????? ?????? ????????????????!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: '???????? ???? ???????????? ??????????!'
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