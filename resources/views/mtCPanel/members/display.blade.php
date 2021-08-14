@extends('mtCPanel.layouts.master')

@section('php')
    @php
        $page = "members";
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
                                        <th>@lang('admin.name')</th>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.nameEn')</th>
                                        <td>{{ $data->nameEn }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.gender')</th>
                                        <td>{{ $data->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.email')</th>
                                        <td>{{ $data->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.phone')</th>
                                        <td>{{ $data->phone_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.whatsapp')</th>
                                        <td>{{ $data->whatsapp_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.national_no')</th>
                                        <td>{{ $data->national_no }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.address')</th>
                                        <td>{{ $data->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('admin.status')</th>
                                        <td>
                                            @if($data->isExpiredMembership())
                                            <span class="label label-danger"> Expired </span>
                                            @endif
                                            @if($data->isActiveMembership())
                                                <span class="label label-success"> Active </span>
                                            @endif
                                            @if($data->isNewRequest())
                                                <span class="label label-warning"> New Request </span>
                                            @endif
                                            @if($data->isConfirmed())
                                                <span class="label label-info"> Wating for Payment </span>
                                            @endif
                                        </td>
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